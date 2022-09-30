<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('course_category_id'), 'has-success': fields.course_category_id && fields.course_category_id.valid }">
    <label for="course_category_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.course_category_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control input" v-model="form.course_category_id" v-validate="'required'"
                @input="validate($event)"
                class="form-control"
                :class="{'form-control-danger': errors.has('course_category_id'), 'form-control-success': fields.course_category_id && fields.course_category_id.valid}"
                id="course_category_id" name="course_category_id">
            <option disabled selected>Выберите город</option>
            <option v-for="category in categories" :value="category.id">@{{ category.title }}
            </option>
        </select>
        <div v-if="errors.has('course_category_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('course_category_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}"
               id="title" name="title" placeholder="{{ trans('admin.course.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('body'), 'has-success': fields.body && fields.body.valid }">
    <label for="body" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.body') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.body" v-validate="''" id="body" name="body" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('body')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('body') }}</div>
    </div>
</div>


<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('duration'), 'has-success': fields.duration && fields.duration.valid }">
    <label for="duration" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.duration') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duration" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('duration'), 'form-control-success': fields.duration && fields.duration.valid}"
               id="duration" name="duration" placeholder="{{ trans('admin.course.columns.duration') }}">
        <div v-if="errors.has('duration')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duration')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course.columns.price') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}"
               id="price" name="price" placeholder="{{ trans('admin.course.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}
        </div>
    </div>
</div>




