<div class="form-group row align-items-center" :class="{'has-danger': errors.has('display_name'), 'has-success': fields.display_name && fields.display_name.valid }">
    <label for="display_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.display_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.display_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('display_name'), 'form-control-success': fields.display_name && fields.display_name.valid}" id="display_name" name="display_name" placeholder="{{ trans('admin.setting.columns.display_name') }}">
        <div v-if="errors.has('display_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('display_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('key'), 'has-success': fields.key && fields.key.valid }">
    <label for="key" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.key') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.key" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('key'), 'form-control-success': fields.key && fields.key.valid}" id="key" name="key" placeholder="{{ trans('admin.setting.columns.key') }}">
        <div v-if="errors.has('key')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('key') }}</div>
    </div>
</div>


@if($mode === 'create')
<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right"
         :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" v-model="form.type" id="type" name="type">
            <option selected value="text"> Текст</option>
            <option value="richtext"> Большой текст</option>
        </select>
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>
 @endif

<div v-if="form.type === 'text'" class="form-group row align-items-center"
     :class="{'has-danger': errors.has('value'), 'has-success': fields.value && fields.value.valid }">
  <label for="value" class="col-form-label text-md-right"
         :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.value') }}</label>
  <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
    <div>
      <textarea class="form-control" v-model="form.value" v-validate="'required'" id="value" name="value"></textarea>
    </div>
    <div v-if="errors.has('value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('value') }}</div>
  </div>
</div>

<div v-if="form.type === 'richtext'" class="form-group row align-items-center"
     :class="{'has-danger': errors.has('value'), 'has-success': fields.value && fields.value.valid }">
    <label for="value" class="col-form-label text-md-right"
         :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.value') }}</label>
  <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
    <quill-editor id="value" name="value" v-model="form.value" :options="wysiwygConfig"/>
  </div>
  <div v-if="errors.has('value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('value') }}</div>
</div>


<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.type') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.type" v-validate="''" id="type" name="type"></textarea>
        </div>
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('value'), 'has-success': fields.value && fields.value.valid }">
    <label for="value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.setting.columns.value') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.value" v-validate="''" id="value" name="value"></textarea>
        </div>
        <div v-if="errors.has('value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('value') }}</div>
    </div>
</div>
 -->

