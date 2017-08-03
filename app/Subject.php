<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subject extends Model
{
	public $primaryKey = 'subject_id';

  

      public function user(){
    	return $this->belongsTo('App\User');
    }

    function students(){
        	
    		return $this->belongsToMany('App\Student','student_subjects','subject_id','student_id')->withPivot('first_grading', 'second_grading','third_grading','fourth_grading');
    }
}
