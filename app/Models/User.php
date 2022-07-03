<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'isAdmin',
        'password_set_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    /**
     * Hash password attribute when being set.
     *
     * @param string $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password)) {
            $this->attributes['password'] = Hash::make($password);
        } else {
            $this->attributes['password'] = $password;
        }
    }

    /**
     * Scope query for users who are admin.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAdmin($query)
    {
        return $query->where('isAdmin', 1);
    }


    /**
     * Scope query for users who are assessors.
     *
     * @param $query
     * @return mixed
     */
    public function scopeAssessor($query)
    {
        return $query->where('isAdmin', 0);
    }
}
