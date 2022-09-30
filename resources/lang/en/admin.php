<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'application' => [
        'title' => 'Applications',

        'actions' => [
            'index' => 'Applications',
            'create' => 'New Application',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'status_id' => 'Status',
            'time' => 'Time',
            'methodist_status_id' => 'Methodist status id',
            'comment' => 'Comment',
        ],
    ],


    'material' => [
        'title' => 'Materials',

        'actions' => [
            'index' => 'Materials',
            'create' => 'New Material',
        ]
    ],
    'teacher-slider' => [
        'title' => 'Teacher Sliders',

        'actions' => [
            'index' => 'Teacher Sliders',
            'create' => 'New Teacher Slider',

            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

            'category' => 'Category',
            'color' => 'Color',
            'image' => 'Image',
            'course' => 'Course',
            'name' => 'Name',

        ],
    ],

    'tab-course' => [
        'title' => 'Tabcourse',

        'actions' => [
            'index' => 'Tabcourse',
            'create' => 'New Tabcourse',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'tab-course' => [
        'title' => 'Tab Courses',

        'actions' => [
            'index' => 'Tab Courses',
            'create' => 'New Tab Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'title_image' => 'Title image',
            'body' => 'Body',
            'image' => 'Image',

        ],
    ],

    'setting' => [
        'title' => 'Settings',

        'actions' => [
            'index' => 'Settings',
            'create' => 'New Setting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
        ],
    ],

    'timetable' => [
        'title' => 'Timetables',

        'actions' => [
            'index' => 'Timetables',
            'create' => 'New Timetable',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'speaking-club' => [
        'title' => 'Speaking Clubs',

        'actions' => [
            'index' => 'Speaking Clubs',
            'create' => 'New Speaking Club',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'timetable' => [
        'title' => 'Timetables',

        'actions' => [
            'index' => 'Timetables',
            'create' => 'New Timetable',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'lesson_id' => 'Lesson',
            'student_id' => 'Student',
            'teacher_id' => 'Teacher',
            'date' => 'Date',
            'start_time' => 'Start time',
            'finish_time' => 'Finish time',

        ],
    ],

    'mode' => [
        'title' => 'Modes',

        'actions' => [
            'index' => 'Modes',
            'create' => 'New Mode',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'monday' => 'Monday',
            'tuesday' => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday' => 'Thursday',
            'friday' => 'Friday',
            'saturday' => 'Saturday',
            'sunday' => 'Sunday',

        ],
    ],

    'course' => [
        'title' => 'Courses',

        'actions' => [
            'index' => 'Courses',
            'create' => 'New Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'body' => 'Body',
            'course_category_id' => 'Course category',
            'duration' => 'Duration',
            'image' => 'Image',
            'price' => 'Price',
            'slug' => 'Slug',
            'title' => 'Title',

        ],
    ],

    'course-timeline' => [
        'title' => 'Course Timelines',

        'actions' => [
            'index' => 'Course Timelines',
            'create' => 'New Course Timeline',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'course_id' => 'Course',
            'model_id' => 'Model',
            'model_type' => 'Model type',
            'sequence' => 'Sequence',

        ],
    ],

    'purchase-course-class' => [
        'title' => 'Запросы на покупку курса',

        'actions' => [
            'index' => 'Запросы на покупку курса',
            'create' => 'New Purchase Course Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'course_class_id' => 'Course class',
            'is_approved' => 'Is approved',

        ],
    ],

    'lesson' => [
        'title' => 'Lessons',

        'actions' => [
            'index' => 'Lessons',
            'create' => 'New Lesson',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'course_section_id' => 'Course section',
            'description' => 'Description',
            'duration_minute' => 'Duration minute',
            'level' => 'Level',
            'title' => 'Title',

        ],
    ],

    'course-section' => [
        'title' => 'Course Sections',

        'actions' => [
            'index' => 'Course Sections',
            'create' => 'New Course Section',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'course_id' => 'Course',
            'title' => 'Title',

        ],
    ],

    'order' => [
        'title' => 'Orders',

        'actions' => [
            'index' => 'Orders',
            'create' => 'New Order',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'number' => 'Number',
            'user_id' => 'User',
            'paid' => 'Paid',
            'status' => 'Status',
            'total' => 'Total',

        ],
    ],

    'setting' => [
        'title' => 'Settings',

        'actions' => [
            'index' => 'Settings',
            'create' => 'New Setting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'display_name' => 'Display name',
            'key' => 'Key',
            'type' => 'Type',
            'value' => 'Value',

        ],
    ],

    'tab-course' => [
        'title' => 'Tab Courses',

        'actions' => [
            'index' => 'Tab Courses',
            'create' => 'New Tab Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'title_image' => 'Title image',
            'body' => 'Body',
            'image' => 'Image',
            
        ],
    ],

    'course-class' => [
        'title' => 'Course Classes',

        'actions' => [
            'index' => 'Course Classes',
            'create' => 'New Course Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'count' => 'Count',
            'course_id' => 'Course',
            'price' => 'Price',
            'sale' => 'Sale',
            'class_price' => 'Class price',
            
        ],
    ],

    'course' => [
        'title' => 'Courses',

        'actions' => [
            'index' => 'Courses',
            'create' => 'New Course',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'author_id' => 'Author',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'image' => 'Image',
            'body' => 'Body',
            'duration' => 'Duration',
            'price' => 'Price',
            'is_visible' => 'Is visible',
            'course_category_id' => 'Course category',
            
        ],
    ],

    'course-class' => [
        'title' => 'Course Classes',

        'actions' => [
            'index' => 'Course Classes',
            'create' => 'New Course Class',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'count' => 'Count',
            'course_id' => 'Course',
            'price' => 'Price',
            'sale' => 'Sale',
            'class_price' => 'Class price',
            'title' => 'Title',
            'percent' => 'Percent',
            'text' => 'Text',
            
        ],
    ],

    'course-case' => [
        'title' => 'Course Cases',

        'actions' => [
            'index' => 'Course Cases',
            'create' => 'New Course Case',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'course_id' => 'Course',
            
        ],
    ],

    'course-fact' => [
        'title' => 'Course Facts',

        'actions' => [
            'index' => 'Course Facts',
            'create' => 'New Course Fact',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'body' => 'Body',
            'course_id' => 'Course',
            
        ],
    ],

    'course-info' => [
        'title' => 'Course Infos',

        'actions' => [
            'index' => 'Course Infos',
            'create' => 'New Course Info',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
            'course_id' => 'Course',
            
        ],
    ],

    'certificate' => [
        'title' => 'Certificates',

        'actions' => [
            'index' => 'Certificates',
            'create' => 'New Certificate',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'body' => 'Body',
            'course_id' => 'Course',
            
        ],
    ],

    'feedback' => [
        'title' => 'Feedback',

        'actions' => [
            'index' => 'Feedback',
            'create' => 'New Feedback',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'rate' => 'Rate',
            'text' => 'Text',
            'course_id' => 'Course',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
