@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.course-class.actions.edit', ['name' => $courseClass->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <course-class-form
                :action="'{{ $courseClass->resource_url }}'"
                :data="{{ $courseClass->toJson() }}"
                :courses="{{ $courses->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.course-class.actions.edit', ['name' => $courseClass->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.course-class.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </course-class-form>

        </div>
    
</div>

@endsection