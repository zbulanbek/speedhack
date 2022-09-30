@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mode.actions.edit', ['name' => $mode->id]))

@section('body')

    <div class="container-xl">
        <div class="card">
            <mode-form
                :action="'{{ $mode->resource_url }}'"
                :data="{{ $mode->toJson() }}"
                v-cloak
                inline-template>
                
                <form class="form-horizontal form-edit" method="post" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mode.actions.edit', ['name' => $mode->id]) }}
                    </div>

                    <div class="card-body">
                        <mode-update :mode="{{ $mode }}" :metodists="{{ $metodists }}"></mode-update>
                    </div>
                    
                    
                   <!--  <div class="card-footer">
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