<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    use HasFactory;
    protected $fillable=[
        'name', 'week_day', 'class_time', 'end_date', 'class_date', 'course_id'
    ];

    public function homeworks() {
        return $this->hasMany(HomeWork::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function notes() {
        return $this->belongsToMany(Note::class, 'period_note', 'period_id', 'note_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
