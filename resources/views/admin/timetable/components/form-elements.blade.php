<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lesson_id'), 'has-success': fields.lesson_id && fields.lesson_id.valid }">
    <label for="lesson_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.lesson_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lesson_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lesson_id'), 'form-control-success': fields.lesson_id && fields.lesson_id.valid}" id="lesson_id" name="lesson_id" placeholder="{{ trans('admin.timetable.columns.lesson_id') }}">
        <div v-if="errors.has('lesson_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lesson_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': fields.student_id && fields.student_id.valid }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.student_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': fields.student_id && fields.student_id.valid}" id="student_id" name="student_id" placeholder="{{ trans('admin.timetable.columns.student_id') }}">
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_id'), 'has-success': fields.teacher_id && fields.teacher_id.valid }">
    <label for="teacher_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.teacher_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.teacher_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('teacher_id'), 'form-control-success': fields.teacher_id && fields.teacher_id.valid}" id="teacher_id" name="teacher_id" placeholder="{{ trans('admin.timetable.columns.teacher_id') }}">
        <div v-if="errors.has('teacher_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date'), 'form-control-success': fields.date && fields.date.valid}" id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_time'), 'has-success': fields.start_time && fields.start_time.valid }">
    <label for="start_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.start_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.start_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_time'), 'form-control-success': fields.start_time && fields.start_time.valid}" id="start_time" name="start_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_time') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('finish_time'), 'has-success': fields.finish_time && fields.finish_time.valid }">
    <label for="finish_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.timetable.columns.finish_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.finish_time" :config="timePickerConfig" v-validate="'date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('finish_time'), 'form-control-success': fields.finish_time && fields.finish_time.valid}" id="finish_time" name="finish_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('finish_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('finish_time') }}</div>
    </div>
</div>



