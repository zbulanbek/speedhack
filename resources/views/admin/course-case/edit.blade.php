@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.course-case.actions.edit', ['name' => $courseCase->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <course-case-form
                :action="'{{ $courseCase->resource_url }}'"
                :courses="{{ $courses->toJson() }}"
                :data="{{ $courseCase->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.course-case.actions.edit', ['name' => $courseCase->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.course-case.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </course-case-form>

        </div>
    
</div>

@endsection