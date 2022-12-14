@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.category.actions.create'))

@section('body')

<div class="container-xl">

    <div class="card">

        <category-form :action="'{{ url('admin/categories') }}'" v-cloak inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.category.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.category.components.form-elements')


                    <div class="form-check row">
                        <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
                            @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Category::class)->getMediaCollection('category'),
                            'label' => 'Gallery'
                            ])
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

        </category-form>

    </div>

</div>


@endsection