<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.book.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.description') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('publisher'), 'has-success': fields.publisher && fields.publisher.valid }">
    <label for="publisher" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.publisher') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.publisher" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('publisher'), 'form-control-success': fields.publisher && fields.publisher.valid}" id="publisher" name="publisher" placeholder="{{ trans('admin.book.columns.publisher') }}">
        <div v-if="errors.has('publisher')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('publisher') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('language'), 'has-success': fields.language && fields.language.valid }">
    <label for="language" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.language') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.language" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('language'), 'form-control-success': fields.language && fields.language.valid}" id="language" name="language" placeholder="{{ trans('admin.book.columns.language') }}">
        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language') }}</div>
    </div>
</div>


<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled" name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.book.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_hard'), 'has-success': fields.is_hard && fields.is_hard.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_hard" type="checkbox" v-model="form.is_hard" v-validate="''" data-vv-name="is_hard" name="is_hard_fake_element">
        <label class="form-check-label" for="is_hard">
            Is Hard Copy Available
        </label>
        <input type="hidden" name="is_hard" :value="form.is_hard">
        <div v-if="errors.has('is_hard')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_hard') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orderNo'), 'has-success': fields.orderNo && fields.orderNo.valid }">
    <label for="orderNo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Order No</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orderNo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orderNo'), 'form-control-success': fields.orderNo && fields.orderNo.valid}" id="orderNo" name="orderNo" placeholder="{{ trans('admin.book.columns.orderNo') }}">
        <div v-if="errors.has('orderNo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orderNo') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Avaiable Status </label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select name="status" class="form-control" v-model="form.status" v-validate="'required'" @input="validate($event)">
            <option disabled value="">Please select one</option>
            <option value="1">Paid</option>
            <option value="2">Show UnLock Question</option>
            <option value="3">Show Question | Without Answer</option>
            <option value="4">Free</option>
        </select>

        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.price') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.book.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('online_amount'), 'has-success': fields.online_amount && fields.online_amount.valid }">
    <label for="online_amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Online Amount</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.online_amount" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('online_amount'), 'form-control-success': fields.online_amount && fields.online_amount.valid}" id="online_amount" name="online_amount" placeholder="{{ trans('admin.book.columns.online_amount') }}">
        <div v-if="errors.has('online_amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('online_amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ship_amount'), 'has-success': fields.ship_amount && fields.ship_amount.valid }">
    <label for="ship_amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Shipment Charges</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ship_amount" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ship_amount'), 'form-control-success': fields.ship_amount && fields.ship_amount.valid}" id="ship_amount" name="ship_amount" placeholder="Shipment Charges">
        <div v-if="errors.has('ship_amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ship_amount') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('category_id'), 'has-success': fields.category_id && fields.category_id.valid }">
    <label for="category_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.book.columns.category_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.category" :options="categories" :multiple="false" track-by="id" label="title" tag-placeholder="{{ __('Select Category') }}" placeholder="{{ __('Category') }}">
        </multiselect>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('author_id'), 'has-success': this.fields.author_id && this.fields.author_id.valid }">
    <label for="author_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Author</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.author" :options="authors" :multiple="false" track-by="id" label="name" tag-placeholder="{{ __('Select Author') }}" placeholder="{{ __('Author') }}">
        </multiselect>
        <div v-if="errors.has('author_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('author_id') }}
        </div>
    </div>
</div>