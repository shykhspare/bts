@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.category.actions.edit', ['name' => $category->title]))

@section('body')

<div class="container-xl">
    <div class="card">

        <category-form :action="'{{ $category->resource_url }}'" :data="{{ $category->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.category.actions.edit', ['name' => $category->title]) }}
                </div>

                <div class="card-body">
                    @include('admin.category.components.form-elements')



                    <div class="form-group row align-items-center">
                        <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
                        <div class="col-md-9 col-xl-8">
                            <div>
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Category::class)->getMediaCollection('category'),
                                'media' => $category->getThumbs200ForCollection('category'),
                                'label' => 'Gallery'
                                ])
                            </div>
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