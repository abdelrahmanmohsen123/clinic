<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function assessments()
    {
        return $this->hasMany(Doctorassessment::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
