<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'doctor_access' => 'array',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['profile_photo_url'];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole($role)
    {
        return $result = $this->role[0]->slug == $role;
    }

    public static function getUsersByRole($role)
    {
        return User::all()
            ->filter->hasRole($role)
            ->values();
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isDoctor()
    {
        return $this->hasRole('doc');
    }

    public function isClient()
    {
        return $this->hasRole('client');
    }
    public function isManager()
    {
        return $this->hasRole('manager');
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class, 'user_id', 'id');
    }
    public function acces()
    {
        return $this->hasMany(Specialty::class, 'doctor_access', 'id');
    }

    public function follow()
    {
        return $this->hasMany(Follow::class, 'menager_id', 'id');
    }
    public function followers()
    {
        return $this->hasMany(Follow::class, 'client_id', 'id');
    }
    public function isFollowing($userId)
    {
        return (bool) $this->follow()
            ->where(['client_id' => $userId, 'status' => Follow::Accepted])
            ->first(['id']);
    }
    public function isRequest($userId)
    {
        return (bool) $this->follow()
            ->where(['client_id' => $userId, 'status' => Follow::Request])
            ->first(['id']);
    }
    public function isRejected($userId)
    {
        return (bool) $this->follow()
            ->where(['client_id' => $userId, 'status' => Follow::Rejected])
            ->first(['id']);
    }
}
