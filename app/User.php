<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Cart;
use App\SocialFacebookAccount;
use App\Ticket;
use App\EventAnswer;
use App\Purchase;
use App\Invoice;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile ()
    {
        return $this->hasOne('App\Profile');
    }

    public function facebook ()
    {
        return $this->belongsTo('App\SocialFacebookAccount');
    }

    public function tickets ()
    {
        return $this->hasMany('App\Ticket');
    }

    public function answers ()
    {
        return $this->hasMany('App\EventAnswer');
    }

    public function purchases ()
    {
        return $this->hasMany('App\Purchase');
    }

    public function invoices ()
    {
        return $this->hasMany('App\Invoice');
    }

    public function carts ()
    {
        return $this->hasMany('App\Cart');
    }
}
