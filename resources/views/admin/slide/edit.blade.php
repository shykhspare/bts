@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.slide.actions.edit', ['name' => $slide->id]))

@section('body')

<div class="container-xl">
    <div class="card">

        <slide-form :action="'{{ $slide->resource_url }}'" :data="{{ $slide->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.slide.actions.edit', ['name' => $slide->id]) }}
                </div>

                <div class="card-body">
                    @include('admin.slide.components.form-elements')

                    {{-- type = 0 or 1 dropdown --}}
                    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
                        <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Slide Type</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-8 col-xl-8'">
                            <select class="form-control" id="type" name="type" v-model="form.type" required>
                                {{-- if form.type = 0 the left Slider selecte else right --}}
                                <option value="0" :selected="form.type == 0">Left Slider</option>
                                <option value="1" :selected="form.type == 1">Right Slider</option>
                            </select>
                            <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
                        <div class="col-md-9 col-xl-8">
                            <div>
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                'mediaCollection' => app(App\Models\Slide::class)->getMediaCollection('slide'),
                                'media' => $slide->getThumbs200ForCollection('slide'),
                                'label' => 'Slide'
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

        </slide-form>

    </div>

</div>

@endsection