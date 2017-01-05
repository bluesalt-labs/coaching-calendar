<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Appointment extends Model {
    const STATUS_AVAILABLE  = 0;
    const STATUS_REQUESTED  = 1;
    const STATUS_CONFIRMED  = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_datetime', 'end_datetime', 'type', 'status', 'coach_user_id', 'customer_user_id',
    ];

    protected function getStatusId($statusName) {
        switch(strtolower($statusName)) {
            case "available": return Appointment::STATUS_AVAILABLE; break;
            case "requested": return Appointment::STATUS_REQUESTED; break;
            case "confirmed": return Appointment::STATUS_CONFIRMED; break;
        }
    }

}
