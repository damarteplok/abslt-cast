<?php

namespace Absltcast;

use Redis;

use Laravel\Cashier\Billable;
use Absltcast\Entities\Learning;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, Learning, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $with = ['subscriptions'];

    protected $fillable = [
        'name', 'email', 'password', 'username', 'confirm_token'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isConfirmed()

    {
      return $this->confirm_token == null;  
    }

    public function confirm()
    {
        $this->confirm_token = null;
        $this->save();
    }
    public function isAdmin()
    {
        return in_array($this->email, config('absltcast.administrators'));
    }

    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
    

}
