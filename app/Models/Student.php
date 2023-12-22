<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'last_name',
        'student_num',
        'birthday',
        'address',
        'parent_phone_number',
        'second_phone_number',
        'gender',
        'enrollment_date',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'student_classroom');
    }
}
