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
     * Relation: A user belongs to a school (e.g., teacher, admin, student)
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Relation: A user can be assigned to multiple classes (teacher or student)
     */
    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'user_school_class');
    }

    /**
     * Relation: If user created chapters (e.g., teacher created)
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'created_by');
    }
}
