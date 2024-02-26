<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'description',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_classroom');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_classroom');
    }
}
