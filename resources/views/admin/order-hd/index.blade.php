@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.order-hd.actions.index'))

@section('body')
@php
$params = null;
if (request()->status != null) {
$params = "?status" . request()->status;
}
@endphp
<order-hd-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/order-hds'.$params) }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.order-hd.actions.index') }}
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/order-hds/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.order-hd.actions.create') }}</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">

                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th class="bulk-checkbox">
                                        <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled" name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

                                    <th is='sortable' :column="'id'">{{ trans('admin.order-hd.columns.id') }}</th>
                                    <!-- <th is='sortable' :column="'session_id'">{{ trans('admin.order-hd.columns.session_id') }}</th> -->
                                    <th is='sortable' :column="'status'">{{ trans('admin.order-hd.columns.status') }}</th>
                                    <!-- <th is='sortable' :column="'user_id'">{{ trans('admin.order-hd.columns.user_id') }}</th> -->
                                    <th is='sortable' :column="'name'">{{ trans('admin.order-hd.columns.name') }}</th>
                                    <!-- <th is='sortable' :column="'email'">{{ trans('admin.order-hd.columns.email') }}</th> -->
                                    <th is='sortable' :column="'phoneno'">{{ trans('admin.order-hd.columns.phoneno') }}</th>
                                    <!-- <th is='sortable' :column="'address'">{{ trans('admin.order-hd.columns.address') }}</th> -->
                                    <!-- <th is='sortable' :column="'company'">{{ trans('admin.order-hd.columns.company') }}</th> -->
                                    <th is='sortable' :column="'amount'">{{ trans('admin.order-hd.columns.amount') }}</th>
                                    <th is='sortable' :column="'orderNo'">{{ trans('admin.order-hd.columns.orderNo') }}</th>
                                    <!-- <th is='sortable' :column="'expired_at'">{{ trans('admin.order-hd.columns.expired_at') }}</th> -->
                                    <!-- <th is='sortable' :column="'city'">{{ trans('admin.order-hd.columns.city') }}</th> -->
                                    <!-- <th is='sortable' :column="'state'">{{ trans('admin.order-hd.columns.state') }}</th> -->
                                    <!-- <th is='sortable' :column="'zip'">{{ trans('admin.order-hd.columns.zip') }}</th> -->
                                    <th is='sortable' :column="'paid'">{{ trans('admin.order-hd.columns.paid') }}</th>
                                    <th is='sortable' :column="'payment_method'">{{ trans('admin.order-hd.columns.payment_method') }}</th>
                                    <th is='sortable' :column="'transaction_no'">{{ trans('admin.order-hd.columns.transaction_no') }}</th>
                                    <!-- <th is='sortable' :column="'transaction_attachment'">{{ trans('admin.order-hd.columns.transaction_attachment') }}</th> -->

                                    <th></th>
                                </tr>
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="21">
                                        <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}. <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/order-hds')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a> </span>

                                        <span class="pull-right pr-2">
                                            <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/order-hds/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                        </span>

                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id" :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>

                                    <td>@{{ item.id }}</td>
                                    <!-- <td>@{{ item.session_id }}</td> -->
                                    <td>

                                        <span v-if="item.status==1" class="badge badge-primary">New</span>
                                        <span v-if="item.status==2" class="badge badge-success">Complete</span>

                                    </td>
                                    <!-- <td>@{{ item.user_id }}</td> -->
                                    <td>@{{ item.name }}</td>
                                    <!-- <td>@{{ item.email }}</td> -->
                                    <td>@{{ item.phoneno }}</td>
                                    <!-- <td>@{{ item.address }}</td> -->
                                    <!-- <td>@{{ item.company }}</td> -->
                                    <td>@{{ item.amount }}</td>
                                    <td>@{{ item.orderNo }}</td>
                                    <!-- <td>@{{ item.expired_at | datetime }}</td> -->
                                    <!-- <td>@{{ item.city }}</td> -->
                                    <!-- <td>@{{ item.state }}</td> -->
                                    <!-- <td>@{{ item.zip }}</td> -->
                                    <td>
                                        <span v-if="item.paid==0" class="badge badge-danger">Unpaid</span>
                                        <span v-if="item.paid==1" class="badge badge-success">Paid</span>
                                    </td>
                                    <td>@{{ item.payment_method }}</td>
                                    <td>@{{ item.transaction_no }}</td>
                                    <!-- <td>@{{ item.transaction_attachment }}</td> -->

                                    <td>
                                        <div class="row no-gutters">

                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="'order-hds/show/'+ item.orderNo" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-eye"></i></a>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/order-hds/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.order-hd.actions.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</order-hd-listing>

@endsection