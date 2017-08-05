@extends('template.master')


@section('content')
<section class="content-header">
 <h1>
        List of Student in Subject
      
      </h1>
      <ol class="breadcrumb"> 
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teacher/list_subject"> List of Subject</a></li>
        <li class="active"> List of Student in Subject </li>
      </ol>
    </section>

  <div class="borderStudent">
    <section class="content-header">
      
      <section class = "content">
        <div class="row">
          <section class="col-lg-12">
            
              <div class="box-header">
                <h3 class="box-title">Students found on Database</h3>
              </div>
              <div class="box-body"> <a href ='{{ url("/teacher/$subject->subject_id/list_allStudent") }}'><button class = 'btn btn-primary'><i class="fa fa-plus-circle" aria-hidden="true">ADD STUDENT</i></button></a> 
                <table class="table"> 
                  <tbody>
                    <tr>                
                     
                      <th>Student Name</th>
                       <th>1st</th>
                       <th>2nd</th>
                       <th>3rd</th>
                       <th>4th</th>
                      <th>Options</th>
                    </tr>
                  </tbody>
                  <tbody>
                  @foreach($subject->students as $student)
                    <tr>
                      
                      <td>
                        {{ $student -> lname}}, {{ $student -> fname}} {{ $student -> mname}}
                      </td>
                      <td>{{ $student->pivot -> first_grading}}</td>
                      <td>{{ $student->pivot -> second_grading}}</td>
                      <td>{{ $student->pivot -> third_grading}}</td>
                      <td>{{ $student->pivot -> fourth_grading}}</td>
                      <td>
                        <a href ='{{ url("teacher/add_grade/$student->student_id") }}/{{$subject->subject_id}}'>
                          <button class = 'btn btn-primary' title="ADD GRADE"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                        </a>
                        <a href ='{{ url("/teacher/update_grade/$student->student_id") }}/{{$subject->subject_id}}'>
                          <button class = 'btn btn-success' title="EDIT GRADE"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                        </a>
                        <a href ='{{ url("/teacher/list_subjstudent/delete/$student->student_id") }}/{{$subject->subject_id}}'  class="delete"  data-confirm="Are you sure to delete this item?">
                          <button class = 'btn btn-danger' title="DELETE  {{ $student -> lname}}, {{ $student -> fname}} {{ $student -> mname}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </a>
                        <!-- <a href ='#'>
                          <button class = 'btn btn-default' title="{{ $student -> student_id}}">classcard</button>
                        </a> -->
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
           
          </section>
        </div>
      </section>
    </section>
  </div>

   <script type="text/javascript">
    var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
  </script>




@endsection
