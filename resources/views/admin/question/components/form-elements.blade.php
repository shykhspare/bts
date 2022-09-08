<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('answer'), 'has-success': fields.answer && fields.answer.valid }">
    <label for="answer" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.answer') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.answer" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('answer'), 'form-control-success': fields.answer && fields.answer.valid}" id="answer" name="answer" placeholder="{{ trans('admin.question.columns.answer') }}">
        <div v-if="errors.has('answer')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('answer') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('paid'), 'has-success': fields.paid && fields.paid.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="paid" type="checkbox" v-model="form.paid" v-validate="''" data-vv-name="paid" name="paid_fake_element">
        <label class="form-check-label" for="paid">
            Paid|Lock
        </label>
        <input type="hidden" name="paid" :value="form.paid">
        <div v-if="errors.has('paid')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('paid') }}</div>


        <button type="submit" class="btn btn-primary m-2" :disabled="submiting">
            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
            {{ trans('brackets/admin-ui::admin.btn.save') }}
        </button>

    </div>

</div>
<div class="form-group row align-items-center">
    <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
    <div class="col-md-9 col-xl-8">
        <div>
            <?php if (isset($question)) :  ?>
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Question::class)->getMediaCollection('question'),
                'media' => $question->getThumbs200ForCollection('question'),
                'label' => 'Question Attachment'
                ])
            <?php else : ?>
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Question::class)->getMediaCollection('question'),
                'label' => 'Question Attachment'
                ])
            <?php endif ?>
        </div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('explanation'), 'has-success': fields.explanation && fields.explanation.valid }">
    <label for="explanation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Answer Explanation</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.explanation" v-validate="''" id="explanation" name="explanation" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('explanation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('explanation') }}</div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"></label>
    <div class="col-md-9 col-xl-8">
        <div>
            <?php if (isset($question)) :  ?>
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Question::class)->getMediaCollection('answer_attachment'),
                'media' => $question->getThumbs200ForCollection('answer_attachment'),
                'label' => 'Answer Attachment'
                ])
            <?php else : ?>
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Question::class)->getMediaCollection('answer_attachment'),
                'label' => 'Answer Attachment'
                ])
            <?php endif ?>
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('marks'), 'has-success': fields.marks && fields.marks.valid }">
    <label for="marks" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.marks') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.marks" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('marks'), 'form-control-success': fields.marks && fields.marks.valid}" id="marks" name="marks" placeholder="{{ trans('admin.question.columns.marks') }}">
        <div v-if="errors.has('marks')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('marks') }}</div>
    </div>
</div>


@if(request()->units != null)
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unit_id'), 'has-success': fields.unit_id && fields.unit_id.valid }">
    <label for="unit_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.unit_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.unit" :options="units" :multiple="false" track-by="id" label="title" tag-placeholder="{{ __('Select Unit') }}" placeholder="{{ __('unit') }}">
        </multiselect>

        <div v-if="errors.has('unit_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unit_id') }}</div>
    </div>
</div>
@else
<input type="hidden" v-model="form.unit" name='unit'>
@endif

@if(request()->test != null)

<input type="hidden" v-model="form.test_id" name="test">
@endif

<div class="form-group row align-items-center">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.type" v-validate="'required'" class="form-control" id="type" name="type">
            <option value="MCQS" selected>MCQS</option>
            <option value="NOTES" selected>NOTES</option>
        </select>

        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>