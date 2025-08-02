<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostData extends Model
{
     //protected $table = 'student_details';
     //protected $fillable = ['SL_NAME','SL_CLASS','SL_ROLL','updated_at','created_at'];

     use HasFactory;

    protected $table = 'student_details';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'hobbies',
        'message',
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];
}
