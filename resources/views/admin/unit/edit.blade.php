@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.unit.actions.edit', ['name' => $unit->title]))

@section('body')

<div class="container-xl">
    <div class="card">

        <unit-form :action="'{{ $unit->resource_url }}'" :data="{{ $unit->toJson() }}" :sections="{{$sections->toJson()}}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.unit.actions.edit', ['name' => $unit->title]) }}
                </div>

                <div class="card-body">
                    @include('admin.unit.components.form-elements')
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </unit-form>

    </div>

</div>

@endsection