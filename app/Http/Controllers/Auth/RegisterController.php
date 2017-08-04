<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Teacher;
use App\Year;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

     public function showRegister_Student()
    {    
        $years = Year::all();
         // $states = DB::table("demo_state")->lists("name","id");
        // dd($years);
        return view('/register_student',compact('years'));
    }/*Show list of Student in Subject*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            
            'role' => 'string|max:255',
            'avatar' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         
        if($data['role']=="Teacher"){

            $user = User::create([
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Teacher::create([
            'teacher_id' => $user->id,
            'fname' => $data['fname'],
             'mname' => $data['mname'],
              'lname' => $data['lname'],
              'gender' => $data['gender'],
              'address' => $data['address'],
               'avatar' => '',
        ]);       

        }elseif($data['role']=="Student"){
            $user = User::create([
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        Student::create([
            'student_id' => $user->id,
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'section' => $data['section'],
            'avatar' => '',
            'year' => $data['year'],
        ]);      

        }
         Session::flash('register',' ');
        return $user;
    }

     public function section()
    {
       
        return view('/register_student',compact('years'));

        dd($years);
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function sectionAjax(request $request)
    {
        //dd($request->id);
        $sections = DB::table("section_names")
                    ->where("section_id",$request->id)
                    ->get();
        return view('sectionselect',compact('sections'));
    }
}
