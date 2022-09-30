@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.course-fact.actions.edit', ['name' => $courseFact->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <course-fact-form
                :action="'{{ $courseFact->resource_url }}'"
                :data="{{ $courseFact->toJson() }}"
                :courses="{{ $courses->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.course-fact.actions.edit', ['name' => $courseFact->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.course-fact.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </course-fact-form>

        </div>
    
</div>

@endsection