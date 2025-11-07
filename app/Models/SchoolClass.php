<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'assign_subjects', 'school_class_id', 'subject_id');
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
