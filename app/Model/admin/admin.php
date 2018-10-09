<?php

namespace App\Model\admin;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class admin extends Model
class admin extends Authenticatable
{
    use Notifiable;
    //
}
