<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @role('Administrator')
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/applications') }}"><i
                        class="nav-icon icon-book-open"></i> {{ trans('admin.application.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/materials') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.material.title') }}</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/teacher-sliders') }}"><i
                        class="nav-icon icon-book-open"></i> {{ trans('admin.teacher-slider.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tab-courses') }}"><i
                        class="nav-icon icon-flag"></i> {{ trans('admin.tab-course.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings') }}"><i
                        class="nav-icon icon-umbrella"></i> {{ trans('admin.setting.title') }}</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/timetables') }}"><i
                        class="nav-icon icon-magnet"></i> {{ trans('admin.timetable.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/speaking-clubs') }}"><i
                        class="nav-icon icon-magnet"></i> {{ trans('admin.speaking-club.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/modes') }}"><i
                        class="nav-icon icon-flag"></i> {{ trans('admin.mode.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/courses') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.course.title') }}</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ url('admin/purchase-course-classes') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.purchase-course-class.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/lessons') }}"><i
                        class="nav-icon icon-graduation"></i> {{ trans('admin.lesson.title') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-sections') }}">
                    <i class="nav-icon icon-book-open"></i> {{ trans('admin.course-section.title') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-cases') }}">
                    <i class="nav-icon icon-book-open"></i> {{ trans('admin.course-case.title') }}</a>
            </li>
             <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-facts') }}">
                    <i class="nav-icon icon-book-open"></i> {{ trans('admin.course-fact.title') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-infos') }}">
                    <i class="nav-icon icon-book-open"></i> {{ trans('admin.course-info.title') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/orders') }}"><i class="nav-icon icon-drop"></i> {{ trans('admin.order.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/course-classes') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.course-class.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}">
                    <i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}">
                    <i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a>
            </li>
            @endrole

            @role('Speaker')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/courses') }}">
                    <i class="nav-icon icon-graduation"></i> {{ trans('admin.course.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/course-sections') }}">
                    <i class="nav-icon icon-book-open"></i> {{ trans('admin.course-section.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/lessons') }}">
                    <i class="nav-icon icon-graduation"></i> {{ trans('admin.lesson.title') }}
                </a>
            </li>
            @endrole

            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
