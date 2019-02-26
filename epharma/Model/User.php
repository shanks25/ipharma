<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    public function roles()
    {
        return $this->belongsToMany('Epharma\Model\Role');
    }

    public function attr()
    {
    	return $this->hasMany('Epharma\Model\UserAttr');
    }
    
    public function address()
    {
    	return $this->hasMany('Epharma\Model\Address');
    }
    
    public function orders() {
        return $this->hasMany('Epharma\Model\Order');
    }

    public function isRole($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }
}
