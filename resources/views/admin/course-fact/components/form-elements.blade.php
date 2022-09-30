<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-fact.columns.body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.body" v-validate="''" id="body" name="body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('body') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-fact.columns.body') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.body" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('body'), 'form-control-success': fields.body && fields.body.valid}" id="body" name="body" placeholder="{{ trans('admin.course-fact.columns.body') }}">
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': fields.course_id && fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-fact.columns.course_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.course_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': fields.course_id && fields.course_id.valid}" id="course_id" name="course_id" placeholder="{{ trans('admin.course-fact.columns.course_id') }}">
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div> -->


<div class="form-group row align-items-center">
    <label for="prop_idr" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.course-fact.columns.course_id') }}
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