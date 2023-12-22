<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'semester',
        'subject_code',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject');
    }
}
