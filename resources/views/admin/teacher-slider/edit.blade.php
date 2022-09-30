@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.teacher-slider.actions.edit', ['name' => $teacherSlider->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <teacher-slider-form
                :action="'{{ $teacherSlider->resource_url }}'"
                :data="{{ $teacherSlider->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.teacher-slider.actions.edit', ['name' => $teacherSlider->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.teacher-slider.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </teacher-slider-form>

        </div>
    
</div>

@endsection