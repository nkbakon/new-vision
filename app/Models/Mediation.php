<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Mediation extends Model
{
    public function student1()
    {
        return $this->belongsTo(Student::class, 'student_id1', 'id');
    }

    public function student2()
    {
        return $this->belongsTo(Student::class, 'student_id2', 'id');
    }

    public function student3()
    {
        return $this->belongsTo(Student::class, 'student_id3', 'id');
    }

    public function student4()
    {
        return $this->belongsTo(Student::class, 'student_id4', 'id');
    }
}
