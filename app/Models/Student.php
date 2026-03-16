<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Student_details;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'roll',
        'class',
        'section',
        'Status',
        'mobile_no',
        'section'
    ];

   public function details()
   {
    return $this->hasMany(Student_details::class, 'student_details_id', 'id');
   }
}
