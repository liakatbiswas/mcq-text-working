<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'image',
        'email',
        'password',
        'school_class_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation: এক user একটি class-এর অন্তর্ভুক্ত
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    /**
     * Relation: প্রোফাইল তথ্য
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Relation: যদি শিক্ষক হয় এবং অধ্যায় তৈরি করে
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
