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

    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'assign_subjects', 'subject_id', 'school_class_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
