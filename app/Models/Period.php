<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    use HasFactory;

    public function homeworks() {
        return $this->hasMany(HomeWork::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}
