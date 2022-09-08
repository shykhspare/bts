@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.order-hd.actions.edit', ['name' => $orderHd->name]))

@section('body')

<div class="container-xl">
    <div class="card">

        <order-hd-form :action="'{{ $orderHd->resource_url }}'" :data="{{ $orderHd->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.order-hd.actions.edit', ['name' => $orderHd->name]) }}
                </div>

                <div class="card-body">
                    @include('admin.order-hd.components.form-elements')

                    <div class="col">
                        <div class="mb-6 mb-md-0">
                            <h6 class="font-weight-medium font-size-22 mb-3">Attachment
                            </h6>
                            <img src="{{asset('images/transactions')}}/{{ $orderHd->transaction_attachment}}" width="300">
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </order-hd-form>

    </div>

</div>

@endsection