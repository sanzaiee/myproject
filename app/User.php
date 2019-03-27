<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'firstname','lastname','phone','status','address','mem_type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//mutators or setter
    public function setFirstnameAttribute($value){
        $this->attributes['firstname']= ucwords($value);
    }
    public function setLastnameAttribute($value){
        $this->attributes['lastname']= ucwords($value);
    }

    public function setEmailAttribute($value){
        $this->attributes['email']= strtolower($value);
    }


    //accessors or getter

    public function getFirstnameAttribute($value){
        return ucwords($value);
    }
    public function getLastnameAttribute($value){
        return ucwords($value);

    }
    public function getEmailAttribute($value){
        return strtolower($value);
}


}