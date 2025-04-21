<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(
            Classes::class,
            'table_classes_student',
            'subjects_id',
            'class_id'
        )->withPivot('status');
    }
}

