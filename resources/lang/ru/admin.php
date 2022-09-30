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
        'title' => 'Заявки',

        'actions' => [
            'index' => 'Заявки',
            'create' => 'Новое заявка',
            'edit' => 'Edit :name',

        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Email',
            'status_id' => 'Статус заявки',
            'time' => 'Время',
            'methodist_status_id' => 'Cтатуса методиста',
            'comment' => 'Комментарий методиста',

        ],
    ],


    'mode' => [
        'title' => 'Pежим работы',

        'actions' => [
            'index' => 'Pежим работы',
            'create' => 'Создать режим работы',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'Учитель',
            'monday' => 'Понедельник',
            'tuesday' => 'Вторник',
            'wednesday' => 'Среда',
            'thursday' => 'Четверг',
            'friday' => 'Пятница',
            'saturday' => 'Суббота',
            'sunday' => 'Воскресенье',

        ],
    ],

    'setting' => [
        'title' => 'Настройки',

        'actions' => [
            'index' => 'Настройки',
            'create' => 'Новая настройка',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'display_name' => 'Отображаемое имя',
            'key' => 'Ключ',
            'type' => 'Тип',
            'value' => 'Значение',

        ],
    ],

     'tab-course' => [
        'title' => 'Как мы учим',

        'actions' => [
            'index' => 'Как мы учим',
            'create' => 'Новая ',
            'edit' => 'Редактировать название',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Hазвание'
        ],
    ],
     'course-class' => [
        'title' => 'Каталог курсов',

        'actions' => [
            'index' => 'Каталог курсов',
            'create' => 'Новая',
            'edit' => 'Редактировать название',
        ],

        'columns' => [
            'id' => 'ID',
            'count' => 'Count',
            'course_id' => 'курс',
            'price' => 'Price',
            'sale' => 'Sale',
            'class_price' => 'Class price',
            
        ],
    ],
    // Do not delete me :) I'm used for auto-generation
];
