<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';

    protected $fillable = [
        'first_name',
        'last_name',
        'teacher_num',
        'birthday',
        'email',
        'phone_number',
        'photo_path',
        'address',
        'gender',
        'classroom_id'
    ];

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
