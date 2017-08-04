<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/register_student', array('as'=> 'section.ajax','uses'=>'Auth\RegisterController@showRegister_Student'));

Route::get('/register_student/ajax/', 'Auth\RegisterController@sectionAjax');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'StudentController@updateProfile');

Route::get('/teacher/profile/{id}', 'TeacherController@showProfile');

Route::post('/teacher/profile/{id}', 'TeacherController@updateProfile');

Route::group(['middleware' => 'auth'], function(){


/*Show*/
Route::get('teacher/new_subject', 'TeacherController@newSubject');
/*Show create Form Subject*/

Route::get('teacher/list_subject', 'TeacherController@showlistSubject');
/*Show list of Subject*/


Route::get('teacher/list_subjstudent/{id}', 'TeacherController@listStudent');
/*Show list of Student in Subject*/

Route::get('teacher/update_subject/{id}', 'TeacherController@showUpdateSubject');
/*Show Subject Update Form*/

Route::post('teacher/update_subject/{id}', 'TeacherController@UpdateSubject');
/*Show Subject Update Form*/

Route::get('/teacher/{id}/list_allStudent', 'TeacherController@listallStudent');
/*Show list of all Student*/


Route::get('teacher/add_grade/{id}/{sub_id}', 'TeacherController@addGrade');
/*Show the form for adding Grade*/

Route::get('student/grades/{id}', 'StudentController@showGrades');
/*Show Grade*/

Route::get('/teacher/update_grade/{id}/{sub_id}', 'TeacherController@showUpdateGrades');
/*Show the form for update Grade*/


Route::post('/teacher/update_grade/{id}/{sub_id}', 'TeacherController@updateGrades');
/*/Show*/


/*Add*/
Route::post('/teacher/new-subjectHandler/', 'TeacherController@new_subjectHandler');

//Route::post('/teacher/list_allStudent/add', 'TeacherController@add_subjStudentHandler');
/*Add Subject*/

Route::post('/teacher/add_grade/{id}/{sub_id}', 'TeacherController@addGrades');
/*Add Grade in Student for one subject*/

Route::post('/teacher/{id}/list_allStudent', 'TeacherController@add_subjStudentHandler');
/*Add Student in Subject*/


/*/Add*/

/*Del*/
Route::get('teacher/list_student/delete/{id}', 'TeacherController@deleteSubject');
/*Delete Subject*/

Route::get('teacher/list_subjstudent/delete/{id}/{sub_id}', 'TeacherController@deleteSubjStudent');
/*Delete student in Subject*/

/*/Del*/



/*EDIT*/


/*/EDIT*/
});