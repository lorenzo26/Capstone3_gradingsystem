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
        'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function subjects(){
        return $this->hasMany('App\Subject','teacher_id','id');
    }


    function teachers(){
        return $this->hasOne('App\Teacher','teacher_id','id');
    }

    function students(){
        return $this->hasOne('App\Student','student_id','id');
    
    }
}
