<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostData extends Model
{
     protected $table = 'student_list';
     protected $fillable = ['SL_NAME','SL_CLASS','SL_ROLL','updated_at','created_at'];
}
