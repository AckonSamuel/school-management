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

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
