<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.application.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.application.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.application.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status_id'), 'has-success': fields.status_id && fields.status_id.valid }">
    <label for="status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.status_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.status_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status_id'), 'form-control-success': fields.status_id && fields.status_id.valid}" id="status_id" name="status_id" placeholder="{{ trans('admin.application.columns.status_id') }}">
          <option v-for="status in applicationStatuses" :value="status.id">@{{ status.name }}</option>
        </select>
        <div v-if="errors.has('status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status_id') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_time'), 'has-success': fields.start_time && fields.start_time.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.start_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_time" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_time'), 'form-control-success': fields.start_time && fields.start_time.valid}" id="start_time" name="start_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('methodist_status_id'), 'has-success': fields.methodist_status_id && fields.methodist_status_id.valid }">
    <label for="methodist_status_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
      {{ trans('admin.application.columns.methodist_status_id') }}
    </label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.methodist_status_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('methodist_status_id'), 'form-control-success': fields.methodist_status_id && fields.methodist_status_id.valid}" id="methodist_status_id" name="methodist_status_id" placeholder="{{ trans('admin.application.columns.methodist_status_id') }}">
          <option value="">Выберите статус</option>
          <option v-for="status in applicationMethodistStatuses" :value="status.id">@{{ status.name }}</option>
        </select>
        <div v-if="errors.has('methodist_status_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('methodist_status_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comment'), 'has-success': fields.comment && fields.comment.valid }">
    <label for="comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.application.columns.comment') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <template v-if="form.comment">
            <a :href="'/storage' + form.comment" download class="btn btn-primary"> Скачать документ</a>
        </template>
        <!-- <textarea class="form-control" v-model="form.comment" v-validate="''" id="value" name="value"></textarea> -->
    </div>
    <div v-if="errors.has('comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comment') }}</div>
</div>
<!-- <img src="{{ Storage::url('/images/courses/01f6d3f7bc4aa79b752d06fcc459fcaf.png') }}"> -->
