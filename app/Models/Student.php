<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Student extends Model
{
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
