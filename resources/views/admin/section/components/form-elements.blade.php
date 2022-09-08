<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.section.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.section.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.section.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('language'), 'has-success': fields.language && fields.language.valid }">
    <label for="language" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.section.columns.language') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.language" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('language'), 'form-control-success': fields.language && fields.language.valid}" id="language" name="language" placeholder="{{ trans('admin.section.columns.language') }}">
        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled" name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.section.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


<div class="form-check row" :class="{'has-danger': errors.has('hassection'), 'has-success': fields.hassection && fields.hassection.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    
    <input class="form-check-input" id="hassection" type="checkbox" v-model="form.hassection" v-validate="''" data-vv-name="hassection" name="hassection_fake_element">
        <label class="form-check-label" for="hassection">
            Parent
        </label>
        <input type="hidden" name="hassection" :value="form.hassection">
        <div v-if="errors.has('hassection')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hassection') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mcqs'), 'has-success': fields.mcqs && fields.mcqs.valid }">
    <label for="mcqs" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.section.columns.mcqs') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mcqs" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mcqs'), 'form-control-success': fields.mcqs && fields.mcqs.valid}" id="mcqs" name="mcqs" placeholder="{{ trans('admin.section.columns.mcqs') }}">
        <div v-if="errors.has('mcqs')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mcqs') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('book_id'), 'has-success': this.fields.book_id && this.fields.book_id.valid }">
    <label for="book_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">book</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.book" :options="books" :multiple="false" track-by="id" label="title" tag-placeholder="{{ __('Select book') }}" placeholder="{{ __('book') }}">
        </multiselect>
        <div v-if="errors.has('book_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('book_id') }}
        </div>
    </div>
</div>




<div v-if="form.hassection==1" class="form-group row align-items-center" :class="{'has-danger': errors.has(''), 'has-success': this.fields.section_id && this.fields.section_id.valid }">
    <label for="section_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">section</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.section" :options="sections" :multiple="false" track-by="id" label="title" tag-placeholder="{{ __('Select section') }}" placeholder="{{ __('section') }}">
        </multiselect>
        <div v-if="errors.has('section_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('section_id') }}
        </div>
    </div>
</div>