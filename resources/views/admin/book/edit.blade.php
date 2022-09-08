@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.book.actions.edit', ['name' => $book->title]))

@section('body')

<div class="container-xl">
    <div class="card">

        <book-form :action="'{{ $book->resource_url }}'" :authors="{{$authors->toJson()}}" :data="{{ $book->toJson() }}" :categories="{{$categories->toJson()}}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.book.actions.edit', ['name' => $book->title]) }}
                </div>

                <div class="card-body">
                    @include('admin.book.components.form-elements')


                    <div class="form-group row align-items-center">
                        <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
                        <div class="col-md-9 col-xl-8">
                            <div>
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Book::class)->getMediaCollection('books'),
                                'media' => $book->getThumbs200ForCollection('books'),
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
                                'media' => $book->getThumbs200ForCollection('pdf'),
                                'label' => 'pdf'
                                ])
                            </div>
                        </div>
                    </div>


                    <?php
                    // $mediaItems = $book->getMedia('books');
                    // dd($mediaItems);
                    ?>
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