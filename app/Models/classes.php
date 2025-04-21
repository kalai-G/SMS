<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(
            Subject::class,
            'table_classes_student', // pivot table
            'class_id',              // this model's FK in pivot
            'subjects_id'            // related model's FK in pivot
        )->withPivot('status');
    }
}
