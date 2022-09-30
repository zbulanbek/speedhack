<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.feedback.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('image'), 'has-success': fields.image && fields.image.valid }">
    <label for="image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.image') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.image" v-validate="''" id="image" name="image"></textarea>
        </div>
        <div v-if="errors.has('image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('image') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rate'), 'has-success': fields.rate && fields.rate.valid }">
    <label for="rate" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.rate') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rate" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rate'), 'form-control-success': fields.rate && fields.rate.valid}" id="rate" name="rate" placeholder="{{ trans('admin.feedback.columns.rate') }}">
        <div v-if="errors.has('rate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rate') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('text'), 'has-success': fields.text && fields.text.valid }">
    <label for="text" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.text') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.text" v-validate="''" id="text" name="text" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('text')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('text') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': fields.course_id && fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.course_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.course_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': fields.course_id && fields.course_id.valid}" id="course_id" name="course_id" placeholder="{{ trans('admin.feedback.columns.course_id') }}">
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center">
    <label for="prop_idr" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.feedback.columns.course_id') }}
    </label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select  v-model="form.course_id" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': fields.course_id && fields.course_id.valid}">
            <template v-for="item in courses">
                <option :value="item.id" :key="item.id">@{{ item.title }}</option>
            </template>
        </select>
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div>

