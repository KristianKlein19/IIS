<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'created_at',
        'updated_at',
        'viditelnost'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */

    public function isAdmin() {
        return $this->admin;
    }

    public function getUser()
    {
        return $this;
    }

    public function canViewProfile()
    {
        if ($this->viditelnost == 0) // unprotected profile can be viewed by all users
            return true;
        elseif (auth()->user() == null) // authorisation check
            return false;
        elseif ($this->viditelnost == 1) // authorised user can view profile visible only for registered users
            return true;
        elseif ($this == auth()->user()->getUser()) // user can view their own profile
            return true;
        elseif (auth()->user()->isAdmin()) // admin can view all profiles
            return true;
        else
            return false;
    }

    public function isMember($group) {
        if ($this->isAdmin())
            return true;
        return $group->getMembers()->where('id_users', $this->id)->isNotEmpty();
    }

    public function isModFor($group) {
        if ($this->isAdmin())
            return true;
        return $group->getMods()->where('id_users', $this->id)->isNotEmpty();
    }
}
