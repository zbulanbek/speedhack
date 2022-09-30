@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mode.actions.create'))

@section('body')

    <div class="container-xl">
        <div class="card">
        
        <mode-form
            :action="'{{ url('admin/modes') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.mode.actions.create') }}
                </div>
                
               
                <div class="card-body">
                    <mode-create :metodists="{{ $metodists }}"></mode-create>
                </div>

                <!-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div> -->
                
            </form>

        </mode-form>

        </div>

        </div>

    
@endsection