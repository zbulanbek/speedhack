<div class="form-group row align-items-center" :class="{'has-danger': errors.has('count'), 'has-success': fields.count && fields.count.valid }">
    <label for="count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.count" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('count'), 'form-control-success': fields.count && fields.count.valid}" id="count" name="count" placeholder="{{ trans('admin.course-class.columns.count') }}">
        <div v-if="errors.has('count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="prop_idr" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.course-class.columns.course_id') }}
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

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('course_id'), 'has-success': fields.course_id && fields.course_id.valid }">
    <label for="course_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.course_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.course_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('course_id'), 'form-control-success': fields.course_id && fields.course_id.valid}" id="course_id" name="course_id" placeholder="{{ trans('admin.course-class.columns.course_id') }}">
        <div v-if="errors.has('course_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('course_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.course-class.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sale'), 'has-success': fields.sale && fields.sale.valid }">
    <label for="sale" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.sale') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sale" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sale'), 'form-control-success': fields.sale && fields.sale.valid}" id="sale" name="sale" placeholder="{{ trans('admin.course-class.columns.sale') }}">
        <div v-if="errors.has('sale')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sale') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_price'), 'has-success': fields.class_price && fields.class_price.valid }">
    <label for="class_price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.class_price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.class_price" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('class_price'), 'form-control-success': fields.class_price && fields.class_price.valid}" id="class_price" name="class_price" placeholder="{{ trans('admin.course-class.columns.class_price') }}">
        <div v-if="errors.has('class_price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.course-class.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('percent'), 'has-success': fields.percent && fields.percent.valid }">
    <label for="percent" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.percent') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.percent" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('percent'), 'form-control-success': fields.percent && fields.percent.valid}" id="percent" name="percent" placeholder="{{ trans('admin.course-class.columns.percent') }}">
        <div v-if="errors.has('percent')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('percent') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('text'), 'has-success': fields.text && fields.text.valid }">
    <label for="text" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.course-class.columns.text') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.text" v-validate="''" id="text" name="text" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('text')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('text') }}</div>
    </div>
</div>


