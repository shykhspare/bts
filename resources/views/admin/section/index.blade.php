@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.section.actions.index'))

@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<?php
$params = null;
if (request()->books != null) {
    $params = "?books[]=" . request()->books[0];
}

?>
{{-- {{dd($data)}} --}}
<section-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/sections'.$params) }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.section.actions.index') }}
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        href="{{ url('admin/sections/create'.$params) }}" role="button"><i class="fa fa-plus"></i>&nbsp;
                        {{ trans('admin.section.actions.create') }}</a>
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control"
                                            placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}"
                                            v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary"
                                                @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{
                                                trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>

                                    <div class="row" v-if="showBooksFilter">
                                        <div class="col-sm-auto form-group">
                                            <p>{{ __('Select Book/s') }}</p>
                                        </div>
                                        <div class="col col-lg-12 col-xl-12 form-group">
                                            <multiselect v-model="booksMultiselect"
                                                :options="{{ $books->map(function($book) { return ['key' => $book->id, 'label' =>  $book->title]; })->toJson() }}"
                                                label="label" track-by="key"
                                                placeholder="{{ __('Type to search By Category/s') }}" :limit="2"
                                                :multiple="true">
                                            </multiselect>
                                        </div>
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
                                        <input class="form-check-input" id="enabled" type="checkbox"
                                            v-model="isClickedAll" v-validate="''" data-vv-name="enabled"
                                            name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

                                    <th is='sortable' :column="'id'">{{ trans('admin.section.columns.id') }}</th>
                                    <th is='sortable' :column="'title'">{{ trans('admin.section.columns.title') }}</th>
                                    <th is='sortable' :column="'language'">{{ trans('admin.section.columns.language') }}
                                    </th>
                                    <th is='sortable' :column="'enabled'">{{ trans('admin.section.columns.enabled') }}
                                    </th>
                                    <th is='sortable' :column="'mcqs'">{{ trans('admin.section.columns.mcqs') }}</th>
                                    <th is='sortable' :column="'book_id'">{{ trans('admin.section.columns.book_id') }}
                                    </th>
                                    <th is='sortable' :column="'hassection'">Parent/Child</th>
                                    <th></th>
                                </tr>
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="10">
                                        <span class="align-middle font-weight-light text-dark">{{
                                            trans('brackets/admin-ui::admin.listing.selected_items') }} @{{
                                            clickedBulkItemsCount }}. <a href="#" class="text-primary"
                                                @click="onBulkItemsClickedAll('/admin/sections')"
                                                v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa"
                                                    :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{
                                                trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{
                                                pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{
                                                trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>
                                        </span>

                                        <span class="pull-right pr-2">
                                            <button class="btn btn-sm btn-danger pr-3 pl-3"
                                                @click="bulkDelete('/admin/sections/bulk-destroy')">{{
                                                trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                        </span>

                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id"
                                    :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox"
                                            v-model="bulkItems[item.id]" v-validate="''"
                                            :data-vv-name="'enabled' + item.id"
                                            :name="'enabled' + item.id + '_fake_element'"
                                            @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>

                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.title }}</td>
                                    <td>@{{ item.language }}</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input"
                                                v-model="collection[index].enabled"
                                                @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>

                                    <td>@{{ item.mcqs }}</td>

                                    <td>@{{ item.book.title }}</td>
                                    <td> <span v-if="item.hassection==0" class="badge badge-primary">Parent </span>
                                        <span v-else class="badge badge-secondary"> Child </span>
                                    </td>

                                    <td>
                                        <div class="row no-gutters">

{{-- 
                                            <div class="col-auto">
                                                <button class="btncopy" :data-id=" item.id "></button>
                                            </div> --}}
                                            
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-info btncopy"
                                                    role="button" :data-id=" item.id "><i class="fa fa-copy"></i></a>
                                            </div>

                                            <div class="col-auto">
                                                <a v-if="!item.sections.length" class="btn btn-sm btn-spinner btn-info"
                                                    :href="'units?sections[]='+ item.id" title="Units" role="button"><i
                                                        class="icon-plane"></i> Units</a>
                                                <a v-else class="btn btn-sm btn-spinner btn-info"
                                                    :href="'sections?section_id='+ item.id" title="Sub Section"
                                                    role="button"><i class="icon-plane"></i> Sub Section</a>
                                            </div>
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                    :href="item.resource_url + '/edit'"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                    role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{
                                    trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/sections/create'.$params) }}"
                                role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.section.actions.create')
                                }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-listing>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Copy Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="copysectionform">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="section_id" id="set_section_id">
                        <label for="book">Book</label>
                        <select onchange="" name="book_id" id="book_id" class="form-control">
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(() => {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $(".btncopy").click(function(){
        var section_id=$(this).attr("data-id");
        $('#set_section_id').val(section_id);
        $('#exampleModalCenter').modal('show');
    });
$("#copysectionform").submit(function(e){
    e.preventDefault();
    var data= $(this).serialize();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
               method:'POST',
               type: 'json',
               url:'{{url('copysection')}}',
               data:data,
               success:function(data) {
                // alert with success message
                $('#exampleModalCenter').modal('hide');
                location.reload();
                alert(data.message);
                //  console.log(data);
               }
            });
});
});
</script>


@endsection