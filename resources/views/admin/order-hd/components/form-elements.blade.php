<div class="form-group row align-items-center" :class="{'has-danger': errors.has('session_id'), 'has-success': fields.session_id && fields.session_id.valid }">
    <label for="session_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.session_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.session_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('session_id'), 'form-control-success': fields.session_id && fields.session_id.valid}" id="session_id" name="session_id" placeholder="{{ trans('admin.order-hd.columns.session_id') }}">
        <div v-if="errors.has('session_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('session_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('expired_at'), 'has-success': fields.expired_at && fields.expired_at.valid }">
    <label for="expired_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.expired_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.expired_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('expired_at'), 'form-control-success': fields.expired_at && fields.expired_at.valid}" id="expired_at" name="expired_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('expired_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('expired_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('transaction_no'), 'has-success': fields.transaction_no && fields.transaction_no.valid }">
    <label for="transaction_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.transaction_no') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.transaction_no" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('transaction_no'), 'form-control-success': fields.transaction_no && fields.transaction_no.valid}" id="transaction_no" name="transaction_no" placeholder="{{ trans('admin.order-hd.columns.transaction_no') }}">
        <div v-if="errors.has('transaction_no')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('transaction_no') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payment_method'), 'has-success': fields.payment_method && fields.payment_method.valid }">
    <label for="payment_method" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.payment_method') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.payment_method" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('payment_method'), 'form-control-success': fields.payment_method && fields.payment_method.valid}" id="payment_method" name="payment_method" placeholder="{{ trans('admin.order-hd.columns.payment_method') }}">
        <div v-if="errors.has('payment_method')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payment_method') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('paid'), 'has-success': fields.paid && fields.paid.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="paid" type="checkbox" v-model="form.paid" v-validate="''" data-vv-name="paid" name="paid_fake_element">
        <label class="form-check-label" for="paid">
            {{ trans('admin.order-hd.columns.paid') }}
        </label>
        <input type="hidden" name="paid" :value="form.paid">
        <div v-if="errors.has('paid')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('paid') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': fields.note && fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.note') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.note" v-validate="''" id="note" name="note"></textarea>
        </div>
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('zip'), 'has-success': fields.zip && fields.zip.valid }">
    <label for="zip" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.zip') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.zip" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('zip'), 'form-control-success': fields.zip && fields.zip.valid}" id="zip" name="zip" placeholder="{{ trans('admin.order-hd.columns.zip') }}">
        <div v-if="errors.has('zip')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('zip') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('state'), 'has-success': fields.state && fields.state.valid }">
    <label for="state" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.state') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.state" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('state'), 'form-control-success': fields.state && fields.state.valid}" id="state" name="state" placeholder="{{ trans('admin.order-hd.columns.state') }}">
        <div v-if="errors.has('state')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('state') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.city') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.city" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('city'), 'form-control-success': fields.city && fields.city.valid}" id="city" name="city" placeholder="{{ trans('admin.order-hd.columns.city') }}">
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orderNo'), 'has-success': fields.orderNo && fields.orderNo.valid }">
    <label for="orderNo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.orderNo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orderNo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orderNo'), 'form-control-success': fields.orderNo && fields.orderNo.valid}" id="orderNo" name="orderNo" placeholder="{{ trans('admin.order-hd.columns.orderNo') }}">
        <div v-if="errors.has('orderNo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orderNo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.status" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}" id="status" name="status" placeholder="{{ trans('admin.order-hd.columns.status') }}">
            <option value="1">New</option>
            <option value="2">Complete</option>

        </select>

        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('amount'), 'has-success': fields.amount && fields.amount.valid }">
    <label for="amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.amount') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.amount" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('amount'), 'form-control-success': fields.amount && fields.amount.valid}" id="amount" name="amount" placeholder="{{ trans('admin.order-hd.columns.amount') }}">
        <div v-if="errors.has('amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company'), 'has-success': fields.company && fields.company.valid }">
    <label for="company" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.company') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company'), 'form-control-success': fields.company && fields.company.valid}" id="company" name="company" placeholder="{{ trans('admin.order-hd.columns.company') }}">
        <div v-if="errors.has('company')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.address') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" @input="validate($event)" class="form-control" id="address" name="address" placeholder="{{ trans('admin.order-hd.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phoneno'), 'has-success': fields.phoneno && fields.phoneno.valid }">
    <label for="phoneno" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.phoneno') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phoneno" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phoneno'), 'form-control-success': fields.phoneno && fields.phoneno.valid}" id="phoneno" name="phoneno" placeholder="{{ trans('admin.order-hd.columns.phoneno') }}">
        <div v-if="errors.has('phoneno')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phoneno') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.order-hd.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.order-hd.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.user_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.order-hd.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('transaction_attachment'), 'has-success': fields.transaction_attachment && fields.transaction_attachment.valid }">
    <label for="transaction_attachment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.order-hd.columns.transaction_attachment') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.transaction_attachment" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('transaction_attachment'), 'form-control-success': fields.transaction_attachment && fields.transaction_attachment.valid}" id="transaction_attachment" name="transaction_attachment" placeholder="{{ trans('admin.order-hd.columns.transaction_attachment') }}">
        <div v-if="errors.has('transaction_attachment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('transaction_attachment') }}</div>
    </div>
</div>