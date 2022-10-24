<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CheckinData extends Authenticatable
{
    const NAME = 'Check In';

    protected $table = "checkin_data";

    public $timestamps = false;

}
