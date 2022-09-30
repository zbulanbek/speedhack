@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.purchase-course-class.actions.edit', ['name' => $purchaseCourseClass->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <purchase-course-class-form
                :action="'{{ $purchaseCourseClass->resource_url }}'"
                :data="{{ $purchaseCourseClass->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.purchase-course-class.actions.edit', ['name' => $purchaseCourseClass->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.purchase-course-class.components.form-elements',['mode'=>'edit'])
                    </div>


                    {{--                    <div class="card-footer">--}}
                    {{--                        <button type="submit" class="btn btn-primary" :disabled="submiting">--}}
                    {{--                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>--}}
                    {{--                            {{ trans('brackets/admin-ui::admin.btn.save') }}--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}

                </form>

            </purchase-course-class-form>

        </div>

    </div>

@endsection
