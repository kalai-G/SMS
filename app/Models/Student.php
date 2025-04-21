<?php

namespace App\Models;

use App\Models\classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    use HasFactory;
    protected $guarded = [];
    public function class()
    {
        return $this->belongsTo(classes::class);
    }
}
