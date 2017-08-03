<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student_Subject extends Model
{

	 protected $fillable = [
        'total',
    ];
	protected $table = 'student_subjects';
	
    public function users(){
    	return $this->hasMany('App\User');
    }
    
// function subjects(){
        	
//     		return $this->belongsToMany('App\Subject','subjectName','subject_id','subject_id')->withPivot('subjectName');
//     }
}
