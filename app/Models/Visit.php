<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
