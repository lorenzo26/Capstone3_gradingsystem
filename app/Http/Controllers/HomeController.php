<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }

   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

     public function updateProfile(Request $request, $id){
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
