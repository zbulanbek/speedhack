@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tab-course.actions.edit', ['name' => $tabCourse->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tab-course-form
                :action="'{{ $tabCourse->resource_url }}'"
                :data="{{ $tabCourse->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tab-course.actions.edit', ['name' => $tabCourse->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tab-course.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tab-course-form>

        </div>
    
</div>

@endsection