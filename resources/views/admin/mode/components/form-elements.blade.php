<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.mode.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monday'), 'has-success': fields.monday && fields.monday.valid }">
    <label for="monday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.monday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.monday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('monday'), 'form-control-success': fields.monday && fields.monday.valid}" id="monday" name="monday" placeholder="{{ trans('admin.mode.columns.monday') }}">
        <div v-if="errors.has('monday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tuesday'), 'has-success': fields.tuesday && fields.tuesday.valid }">
    <label for="tuesday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.tuesday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tuesday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tuesday'), 'form-control-success': fields.tuesday && fields.tuesday.valid}" id="tuesday" name="tuesday" placeholder="{{ trans('admin.mode.columns.tuesday') }}">
        <div v-if="errors.has('tuesday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tuesday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wednesday'), 'has-success': fields.wednesday && fields.wednesday.valid }">
    <label for="wednesday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.wednesday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wednesday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wednesday'), 'form-control-success': fields.wednesday && fields.wednesday.valid}" id="wednesday" name="wednesday" placeholder="{{ trans('admin.mode.columns.wednesday') }}">
        <div v-if="errors.has('wednesday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wednesday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('thursday'), 'has-success': fields.thursday && fields.thursday.valid }">
    <label for="thursday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.thursday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.thursday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('thursday'), 'form-control-success': fields.thursday && fields.thursday.valid}" id="thursday" name="thursday" placeholder="{{ trans('admin.mode.columns.thursday') }}">
        <div v-if="errors.has('thursday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('thursday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('friday'), 'has-success': fields.friday && fields.friday.valid }">
    <label for="friday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.friday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.friday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('friday'), 'form-control-success': fields.friday && fields.friday.valid}" id="friday" name="friday" placeholder="{{ trans('admin.mode.columns.friday') }}">
        <div v-if="errors.has('friday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('friday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('saturday'), 'has-success': fields.saturday && fields.saturday.valid }">
    <label for="saturday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.saturday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.saturday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('saturday'), 'form-control-success': fields.saturday && fields.saturday.valid}" id="saturday" name="saturday" placeholder="{{ trans('admin.mode.columns.saturday') }}">
        <div v-if="errors.has('saturday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('saturday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sunday'), 'has-success': fields.sunday && fields.sunday.valid }">
    <label for="sunday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mode.columns.sunday') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sunday" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sunday'), 'form-control-success': fields.sunday && fields.sunday.valid}" id="sunday" name="sunday" placeholder="{{ trans('admin.mode.columns.sunday') }}">
        <div v-if="errors.has('sunday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sunday') }}</div>
    </div>
</div>


