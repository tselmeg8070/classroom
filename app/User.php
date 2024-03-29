<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name', 'sex', 'birth_date', 'phone_number', 'verified', 'wallet'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function healths(){
        return $this->hasMany('App\Health', 'user_id', 'id')->orderBy('id', 'desc');
    }
    public function health(){
        return $this->hasMany('App\Health', 'user_id', 'id')->orderBy('id', 'desc')->first();
    }

    public function plan() {
        return $this->belongsToMany('App\Plan', 'plan_users', 'user_id', 'plan_id')->orderByDesc('id')->first();
    }

    public function plans() {
        return $this->belongsToMany('App\Plan', 'plan_users', 'user_id', 'plan_id')->orderByDesc('id');
    }
}
