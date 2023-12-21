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
        'classroom_id',
        'enrollment_date',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
