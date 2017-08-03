<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	protected $fillable = [
        'fname', 'mname','lname', 'gender', 'address' , 'student_id','year','section','avatar',
    ];

	public $primaryKey = 'student_id';

   function subjects(){
   		return $this->belongsToMany('App\Subject','student_subjects','student_id','subject_id')->withPivot('first_grading', 'second_grading','third_grading','fourth_grading');
   }


      public function user(){
    	return $this->belongsTo('App\User','id','student_id')->withPivot('fname', 'mname','lname','gender','address');
    }


   
}
