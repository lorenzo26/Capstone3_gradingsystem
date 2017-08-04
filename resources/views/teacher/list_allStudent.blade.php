@extends('template.master')


  @section('content')    

  @if(Session::has('message'))  
    <script type="text/javascript">
      swal(
      'Student have been Added!',
      '',
      'success',
      );
    </script>
  @endif
  <section class="content-header">
 <h1>
        List of Students
      
      </h1>
       <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teacher/list_subject"> List of Subject</a></li>
         <li><a href="/teacher/list_subjstudent/"> List of Student in Subject</a></li>
        <li class="active">List of Students</li>
      </ol> 
    </section>

  <div class="borderStudent">
    <section class="content-header">
    <form method="POST">
      <h1>List of Students</h1>
        <section class = "content">
          <div class="row">
            <section class="col-lg-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Students found on Database</h3>
                </div>
                <table class="table"> 
                  <tbody>
                    <tr>                
                     
                      <th>Student Name</th>
                       <th>Year</th>
                      <th>Options</th>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr> @if(count($allStudents))
                    @foreach($allStudents as $allStudent)
                      
                      <td>{{ $allStudent-> lname}}, {{ $allStudent-> fname}} {{ $allStudent-> mname}}</td>
                       <td>{{ $allStudent-> year}}</td>
                      <td>
                        <input type="checkbox" value= "{{ $allStudent-> student_id}}" title="{{ $allStudent-> student_id}}" name="student[]">
                      <td>
                    </tr>
                   @endforeach
                   @endif
                  </tbody>
                </table>
              </div>
            </section>
          </div>
        </section>
        {{ csrf_field() }}
      <button class = 'btn btn-primary'><i class="fa fa-plus-circle" aria-hidden="true">ADD STUDENT</i></button></a> 
      </form>
    </section>
  </div>
@endsection
