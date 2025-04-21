<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
     protected $guarded = [];
    // 🧑 Student relationship
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    

}
