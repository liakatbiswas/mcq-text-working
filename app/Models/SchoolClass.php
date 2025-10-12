<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'name',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'assign_subjects');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
