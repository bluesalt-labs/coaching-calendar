<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use DateTime;

class Appointment extends Model
{
    const STATUS_AVAILABLE  = 0;
    const STATUS_REQUESTED  = 1;
    const STATUS_CONFIRMED  = 2;
    const STATUS_CANCELED   = 3;

    //const TYPE_   = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_datetime', 'end_datetime', 'type', 'status', 'coach_user_id', 'member_user_id',
    ];

    public function isAvailable() {
        return !($this->member_user_id >= 0 || $this->status != Appointment::STATUS_AVAILABLE);
    }

    public function schedule($customerID, $statusID, $overwriteCustomer = false) {
        if(!$overwriteCustomer && !$this->isAvailable()) {
           // todo: Appointment is not available
            return false; // dev
        } else {
            //todo: $appointment->type?
            $this->status = $statusID;
            $this->member_user_id = $customerID;
            $this->save();
            return true;
        }
    }

    /**
     * Returns all appointment types as an array
     *
     * @return array
     */
    public static function getStatuses() {
        return array(
            Appointment::STATUS_AVAILABLE   => 'Available',
            Appointment::STATUS_REQUESTED   => 'Requested',
            Appointment::STATUS_CONFIRMED   => 'Confirmed',
            Appointment::STATUS_CANCELED    => 'Canceled',
        );
    }

    /**
     * Make sure the appointment type is valid
     *
     * @param $type
     * @return int|null
     */
    public static function validateStatus($type) {
        if ($type == self::STATUS_AVAILABLE)        { return self::STATUS_AVAILABLE; }
        else if ($type == self::STATUS_REQUESTED)   { return self::STATUS_REQUESTED; }
        else if ($type == self::STATUS_CONFIRMED)   { return self::STATUS_CONFIRMED; }
        else if ($type == self::STATUS_CANCELED)    { return self::STATUS_CANCELED; }
        else { return null; }
    }

    public function getStatusId($statusName) {
        switch(strtolower($statusName)) {
            case "available":   return Appointment::STATUS_AVAILABLE;   break;
            case "requested":   return Appointment::STATUS_REQUESTED;   break;
            case "confirmed":   return Appointment::STATUS_CONFIRMED;   break;
            default: return -1;
        }
    }

    public static function getByDateRange(DateTime $startDate, DateTime $endDate, $availOnly = true) {
        $qry = Appointment::whereBetween('start_datetime', array(
                $startDate->format(DateTime::ATOM),
                $endDate->format(DateTime::ATOM),
            )
        );

        if($availOnly) { $qry->where('status', Appointment::STATUS_AVAILABLE); }

        return $qry->orderBy('start_datetime', 'asc')->get();
    }
}
