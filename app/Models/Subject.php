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

    /**
     * Relation: Subject can be assigned to many classes
     */
    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'assign_subjects');
    }

    /**
     * Relation: Subject has many assigned subjects records
     */
    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
