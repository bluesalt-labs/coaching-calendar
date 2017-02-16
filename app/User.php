<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const TYPE_MEMBER   = 0;
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];


    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        /*
        // todo: figure out if this is the correct place for this
        if($this->api_token == null || $this->api_token == '') {
            $this->api_token = str_random(60);
            $this->save();
        }
        */
    }


    /**
     * Returns the int value of a member type by name
     *
     * @param $typeName
     * @return int
     */
    public function getTypeId($typeName) {
        switch(strtolower($typeName)) {
            case "user":    return User::TYPE_MEMBER;   break;
            case "coach":   return User::TYPE_COACH;    break;
            case "manager": return User::TYPE_MANAGER;  break;
            case "admin":   return User::TYPE_ADMIN;    break;
            default: return -1;
        }
    }

    public static function validateEmail($email) {
        $user = User::select('id')->where('email', $email)->first();

        if($user['id'] != null && $user['id'] > 0) {
            return null;
        }

        return $email;
    }

    public static function validateType($type) {
        if ($type == self::TYPE_MEMBER)        { return self::TYPE_MEMBER; }
        else if ($type == self::TYPE_COACH)    { return self::TYPE_COACH; }
        else if ($type == self::TYPE_MANAGER)  { return self::TYPE_MANAGER; }
        else if ($type == self::TYPE_ADMIN)    { return self::TYPE_ADMIN; }
        else { return null; }
    }

    public static function getRandomAPIString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*(){}[]+-_';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 60; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function getName() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
}
