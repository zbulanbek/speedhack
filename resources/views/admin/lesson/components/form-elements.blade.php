<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('course_section_id'), 'has-success': fields.course_section_id && fields.course_section_id.valid }">
    <label for="course_section_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.course_section_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control input" v-model="form.course_section_id" v-validate="'required'"
                @input="validate($event)"
                class="form-control"
                :class="{'form-control-danger': errors.has('course_section_id'), 'form-control-success': fields.course_section_id && fields.course_section_id.valid}"
                id="course_section_id" name="course_section_id">
            <option disabled selected>Выберите курс</option>
            <option v-for="section in courseSections" :value="section.id">
                @{{ section.title }}
            </option>
        </select>
        <div v-if="errors.has('course_section_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('course_section_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('duration_minute'), 'has-success': fields.duration_minute && fields.duration_minute.valid }">
    <label for="duration_minute" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.duration_minute') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duration_minute" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('duration_minute'), 'form-control-success': fields.duration_minute && fields.duration_minute.valid}" id="duration_minute" name="duration_minute" placeholder="{{ trans('admin.lesson.columns.duration_minute') }}">
        <div v-if="errors.has('duration_minute')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duration_minute') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('level'), 'has-success': fields.level && fields.level.valid }">
    <label for="level" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.level') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.level" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('level'), 'form-control-success': fields.level && fields.level.valid}" id="level" name="level" placeholder="{{ trans('admin.lesson.columns.level') }}">
        <div v-if="errors.has('level')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('level') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.lesson.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.lesson.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>


@if($mode === 'create')
    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => app(\App\Models\Lesson::class)->getMediaCollection('materials'),
        'label' => 'material'
    ])

    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => app(\App\Models\Lesson::class)->getMediaCollection('video'),
        'label' => 'video'
    ])
@else
    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => app(App\Models\Lesson::class)->getMediaCollection('materials'),
        'media' => $lesson->getThumbs200ForCollection('materials'),
        'label' => 'material'
    ])
    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => app(App\Models\Lesson::class)->getMediaCollection('video'),
        'media' => $lesson->getThumbs200ForCollection('video'),
        'label' => 'video'
    ])
@endif
