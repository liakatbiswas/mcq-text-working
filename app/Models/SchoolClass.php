<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'name',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    /**
     * Relation: A class belongs to a school
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Relation: A class has many assigned subjects
     */
    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

    /**
     * Relation: A class has many subjects through assigned subjects
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'assign_subjects');
    }

    /**
     * Relation: A class has many users (students or teachers)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_school_class');
    }
}
