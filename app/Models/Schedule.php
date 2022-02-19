<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // public function visit()
    // {
    //     return $this->hasOne(Visit::class);
    // }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
