@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.book.actions.create'))

@section('body')

<div class="container-xl">

    <div class="card">

        <book-form :action="'{{ url('admin/books') }}'" :authors="{{$authors->toJson()}}" :categories="{{$categories->toJson()}}" v-cloak inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.book.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.book.components.form-elements')

                    <div class="form-group row align-items-center">
                        <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
                        <div class="col-md-9 col-xl-8">
                            <div>
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Book::class)->getMediaCollection('books'),
                                'label' => 'Gallery'
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
                        <div class="col-md-9 col-xl-8">
                            <div>
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Book::class)->getMediaCollection('pdf'),
                                'label' => 'pdf'
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

        </book-form>

    </div>

</div>


@endsection