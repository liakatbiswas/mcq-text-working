<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Relation: A school has many users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relation: A school has many classes
     */
    public function schoolClasses()
    {
        return $this->hasMany(SchoolClass::class);
    }
}
