<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student_details extends Authenticatable
{
    use Notifiable;

    protected $table = 'student_details';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        // Add other fillable fields if needed
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
