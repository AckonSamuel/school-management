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
        'teacher_id',
        'student_id',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
