<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    const TYPE_USER     = 0;
    const TYPE_COACH    = 1;
    const TYPE_MANAGER  = 2;
    const TYPE_ADMIN    = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'first_name', 'last_name', 'email', 'phone',
    ];

    /**
     * Returns the int value of a member type by name
     *
     * @param $typeName
     * @return int
     */
    public function getTypeId($typeName) {
        switch(strtolower($typeName)) {
            case "user":    return User::TYPE_USER;     break;
            case "coach":   return User::TYPE_COACH;    break;
            case "manager": return User::TYPE_MANAGER;  break;
            case "admin":   return User::TYPE_ADMIN;    break;
            default: return -1;
        }
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'password', ];
}
