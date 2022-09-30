@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.course-category.actions.edit', ['name' => $courseCategory->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <course-category-form
                :action="'{{ $courseCategory->resource_url }}'"
                :data="{{ $courseCategory->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.course-category.actions.edit', ['name' => $courseCategory->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.course-category.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </course-category-form>

        </div>
    
</div>

@endsection