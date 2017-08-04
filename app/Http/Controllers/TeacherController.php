<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;	
use Illuminate\Support\Facades\DB;
use Session;


use App\Student;
use App\Teacher;
use App\Subject;
use App\User;
use App\Student_Subject;

class TeacherController extends Controller
{


    public function showProfile()  {
         if(Auth::user()->role=='Teacher'){
       
        
        return view('/teacher/profile');

    }
    return back();
    }/*Show Profile*/




     public function showUpdateGrades( $id, $sub_id)  {
         if(Auth::user()->role=='Teacher'){
        $grade = Student_Subject::where('subject_id',$sub_id)->where('student_id',$id)->first();
        
        return view('/teacher/update_grade',compact('grade'));
    }
    return back();
    }/*Show form update grade*/

	public function listStudent($id)
	{
        if(Auth::user()->role=='Teacher'){
        $subject = Subject::where('subject_id',$id)->first();
        
        return view('teacher/list_subjstudent', compact('subject'));

    }
      return back();
    }/*Show list of Student in Subject*/


    public function showUpdateSubject($id)
    {
        if(Auth::user()->role=='Teacher'){
        $subject = Subject::where('subject_id',$id)->first();
        return view('teacher/update_subject', compact('subject'));

    }
      return back();
    }/*Show list of Student in Subject*/

 public function UpdateSubject(Request $request, $id)
    {
        if(Auth::user()->role=='Teacher'){
        
           
               $updateSubject = Subject::find($id);
               $updateSubject -> subjectName = $request -> subjname;
               $updateSubject -> year = $request -> year;
             
               $updateSubject -> save();
           
    }

         Session::flash('message',' ');
      return back();
    }/*Show list of Student in Subject*/
    public function listallStudent($id)
    {
        if(Auth::user()->role=='Teacher'){
        $year = Subject::find($id)->year;
        $allStudents = Student::where('year',$year)->get();

        $enrolled = Subject::find($id)->students;

        $allStudents = $allStudents->diff($enrolled);
        
        return view('teacher/list_allStudent', compact('allStudents'));
        }
        return back();
    }/*Show list of Student in Subject*/


    public function newSubject()
    {
        if(Auth::user()->role=='Teacher'){
        return view('teacher/new_subject');
    }
    return back();
    }/*Show create Form Subject*/


     public function addGrade( $id, $sub_id)
    {

        if(Auth::user()->role=='Teacher'){
        $subject = Student_Subject::where('subject_id',$sub_id)->where('student_id',$id)->first();
       

        // dd($subject);          
        return view('teacher/add_grade',compact('subject'));
    }
    return back();
    }/*Show add Form grade*/

    public function addGrades(Request $request, $id, $sub_id){
        if(isset($request->first)){
            $grading = 'first_grading';
            $grade = $request->first;

        }
        else if(isset($request->second)){
            $grading = 'second_grading';
            $grade = $request->second;
        }
        else if(isset($request->third)){
            $grading = 'third_grading';
            $grade = $request->third;
        }
        else{
            $grading = 'fourth_grading';
            $grade = $request->fourth;    
        }
        
        $subject = Subject::find($sub_id);
        $subject->students()->where('students.student_id',$id)->first()->pivot->update([$grading => $grade]);


         Session::flash('message',' ');
        return back();
    }


     public function updateGrades(Request $request, $id, $sub_id){
        if(isset($request->first)){
            $grading = 'first_grading';
            $grade = $request->first;
        }
        else if(isset($request->second)){
            $grading = 'second_grading';
            $grade = $request->second;
        }
        else if(isset($request->third)){
            $grading = 'third_grading';
            $grade = $request->third;
        }
        else{
            $grading = 'fourth_grading';
            $grade = $request->fourth;    
        }
        
        $subject = Subject::find($sub_id);
        $subject->students()->where('students.student_id',$id)->first()->pivot->update([$grading => $grade]);
          Session::flash('message',' ');

        return back();
    }


 public function updateProfile(Request $request, $id){
        if(isset($request->f1)){
          
            $image = $request->f1;
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/images/',$filename);
            $prof= Teacher::find($id);
            // dd($prof);
            $prof -> avatar = 'assets/images/'.$filename;
             Session::flash('message',' ');    
            $prof -> save();
       
        }else{
            $updateData = Teacher::find($id);
            $updateData -> lname = $request -> lastname;
            $updateData -> fname = $request -> firstname;
            $updateData -> mname = $request -> middlename;
            $updateData -> address = $request -> address;            
            $updateData ->save();
            $updateEmail = User::find($id);
            $updateEmail -> email = $request -> email;
             Session::flash('message',' ');
            $updateEmail ->save();
        }
        
       
        
  
        return back();
    }




    function showlistSubject(){
        if(Auth::user()->role=='Teacher'){
        $subjects = Auth::user()->subjects;
        return view('teacher/list_subject', compact('subjects'));
        }
        return back();
    }   /*Show list of Subject*/

    public function new_subjectHandler(Request $request){
        $teacher_subject = new Subject;
        $teacher_subject-> teacher_id = Auth::id();
        $teacher_subject-> subjectName =  $request -> subjname;
         $teacher_subject-> year =  $request -> year;
        $teacher_subject->save();
        Session::flash('message',' ');
        return back();   
    
    }/*Add Subject*/

    function deleteSubject($id){

        // dd($request);
        $subject_tbd = Subject::find($id);
       
        $subject_tbd -> delete();

         $subjstudent_tbd = Student_Subject::where('subject_id',$id);

         $subjstudent_tbd -> delete();

        return back();

    }/*Delete Subject*/


    function deleteSubjStudent($id,$sub_id){
        $student_tbd = Student::find($id)->subjects()->detach($sub_id);

        return back();

    }/*Delete student in Subject*/

 public function add_subjStudentHandler(Request $request,$id){

    $subject = Subject::find($id);
    if(count($request->student)){
    foreach ($request->student as $s) {   
        $subject->students()->attach($s, ['teacher_id' => Auth::id()]);
    }
}
        
        // $subjStudents_tble = new Student_Subject;
        // $subjStudents_tble-> teacher_id = Auth::id();
        // $subjStudents_tble-> student_id =  $request -> student;
        // $subjStudents_tble->save();
     Session::flash('message',' ');

        return back();  
    
    }/*Add student in Subject*/



	

}
