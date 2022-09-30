@if($mode === 'create')
    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.purchase-course-class.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.purchase-course-class.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_class_id'), 'has-success': fields.course_class_id && fields.course_class_id.valid }">
    <label for="course_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.purchase-course-class.columns.course_class_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.course_class_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_class_id'), 'form-control-success': fields.course_class_id && fields.course_class_id.valid}" id="course_class_id" name="course_class_id" placeholder="{{ trans('admin.purchase-course-class.columns.course_class_id') }}">
        <div v-if="errors.has('course_class_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_class_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_approved'), 'has-success': fields.is_approved && fields.is_approved.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_approved" type="checkbox" v-model="form.is_approved" v-validate="''" data-vv-name="is_approved"  name="is_approved_fake_element">
        <label class="form-check-label" for="is_approved">
            {{ trans('admin.purchase-course-class.columns.is_approved') }}
        </label>
        <input type="hidden" name="is_approved" :value="form.is_approved">
        <div v-if="errors.has('is_approved')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_approved') }}</div>
    </div>
</div>
@else
    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
        <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.purchase-course-class.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" class="form-control success" disabled
                   value="{{$purchaseCourseClass->user->name.' '.$purchaseCourseClass->user->surname.' '.$purchaseCourseClass->user->patronymic}}">
            <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
        <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Email</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" class="form-control success" disabled
                   value="{{$purchaseCourseClass->user->email}}">
            <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
        <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Telephone</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" class="form-control success" disabled
                   value="{{$purchaseCourseClass->user->phone}}">
            <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_class_id'), 'has-success': fields.course_class_id && fields.course_class_id.valid }">
        <label for="course_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Course name</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" disabled value="{{$purchaseCourseClass->class->course->title}}" class="form-control" >
        </div>
    </div>

    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_class_id'), 'has-success': fields.course_class_id && fields.course_class_id.valid }">
        <label for="course_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Course class count</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" disabled value="{{$purchaseCourseClass->class->count}}" class="form-control" >
        </div>
    </div>

    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_class_id'), 'has-success': fields.course_class_id && fields.course_class_id.valid }">
        <label for="course_class_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Price</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" disabled value="{{$purchaseCourseClass->class->price.' тг'}}" class="form-control" >
        </div>
    </div>
@endif

