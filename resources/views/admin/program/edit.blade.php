@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.program.actions.edit', ['name' => $program->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <program-form
                :action="'{{ $program->resource_url }}'"
                :data="{{ $program->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.program.actions.edit', ['name' => $program->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.program.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </program-form>

        </div>
    
</div>

@endsection