@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.purchase-course-class.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <purchase-course-class-form
            :action="'{{ url('admin/purchase-course-classes') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.purchase-course-class.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.purchase-course-class.components.form-elements',['mode'=>'create'])
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </purchase-course-class-form>

        </div>

        </div>


@endsection
