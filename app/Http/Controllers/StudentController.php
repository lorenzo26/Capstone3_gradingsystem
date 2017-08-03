<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use Illuminate\Support\Facades\DB;


use App\Teacher;
use App\Subject;
use App\Student_Subject;
use App\Student;
use App\User;

class StudentController extends Controller
{
	public function showGrades($id)
    {
      
         $student = Student::find($id);
     
        return view('student/grades',compact('student'));
    }

     public function updateProfile(Request $request){
		$id=$request->id;
        if(isset($request->f1)){
          
            $image = $request->f1;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/',$filename);
            $prof= Student::find($id);
            // dd($prof);
            $prof -> avatar = 'assets/images/'.$filename;    
            $prof -> save();
       
        }else{
            $updateData = Student::find($id);
            $updateData -> lname = $request -> lastname;
            $updateData -> fname = $request -> firstname;
            $updateData -> mname = $request -> middlename;
            $updateData -> address = $request -> address;            
            $updateData ->save();
            $updateEmail = User::find($id);
            $updateEmail -> email = $request -> email;
            $updateEmail ->save();
        }


        return back();
    }


}
