<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function periods() {
        return $this->hasMany(Period::class);
    }

    public function students() {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }
}
