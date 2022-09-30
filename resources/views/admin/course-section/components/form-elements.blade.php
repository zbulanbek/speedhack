<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('course_id'), 'has-success': fields.course_id && fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-section.columns.course_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control input" v-model="form.course_id" v-validate="'required'"
                @input="validate($event)"
                class="form-control"
                :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': fields.course_id && fields.course_id.valid}"
                id="course_id" name="course_id">
            <option disabled selected>Выберите курс</option>
            <option v-for="course in courses" :value="course.id">
                @{{ course.title }}
            </option>
        </select>
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('course_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-section.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.course-section.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>


