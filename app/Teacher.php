<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   protected $fillable = [
        'fname', 'mname','lname', 'gender', 'address' , 'teacher_id','avatar',
    ];


public $primaryKey = 'teacher_id';
      public function user(){
    	return $this->belongsTo('App\User','id','teacher_id')->withPivot('fname', 'mname','lname','gender','address');
    }


    


}
