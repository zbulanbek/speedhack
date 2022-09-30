<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const STUDENT_ROLE_ID = 2;
    public const TEACHER_ROLE_ID = 3;
    public const METODIST_ROLE_ID = 4;

}
