<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'country',
        'dob',
        'gender',
        'facebook',
        'linkedin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
