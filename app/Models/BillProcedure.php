<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProcedure extends Model
{
    use HasFactory;
    public $guarded = [];
    public function procedures()
    {
        return $this->belongsToMany(Procedure::class,'bill_procedures');
    }
}
