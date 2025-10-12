<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name_en',
        'name_bn',
        'sub_code',
    ];

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'assign_subjects');
    }
}
