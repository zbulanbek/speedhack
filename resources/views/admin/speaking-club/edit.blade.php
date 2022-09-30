@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.speaking-club.actions.edit', ['name' => $speakingClub->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <speaking-club-form
                :action="'{{ $speakingClub->resource_url }}'"
                :data="{{ $speakingClub->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.speaking-club.actions.edit', ['name' => $speakingClub->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.speaking-club.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </speaking-club-form>

        </div>
    
</div>

@endsection