<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'language_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function hasRole($role)
    {
        if ($this->role_id > 0) {
            if ($this->role->name == $role) {
                return true;
            }
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
