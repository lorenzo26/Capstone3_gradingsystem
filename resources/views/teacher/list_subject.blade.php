@extends('template.master')


@section('content')
<script type="text/javascript">
  function ConfirmDelete(){
      var d = confirm('Do you really want to delete data?');
      
      if(d == false){
          return false;
    }
}

</script>

<section class="content-header">
      <h1>
        List of Subject
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of Subject</li>
      </ol>
    </section>

  <div class="borderStudent">
    <section class="content-header">
  
      <section class = "content">
        <div class="row">
          <section class="col-lg-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Subjects found on Database</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tbody>
                    <tr>                
                      <th>Subject Name</th>
                      <th>year</th>
                      <th>Options</th>
                    </tr>
                  </tbody>
                  <tbody>
                  @foreach($subjects as $subject)
                    <tr>
                      <td>{{ $subject -> subjectName }}</td>
                      <td>{{ $subject -> year }}</td>
                      <td> 
                      
                      <div class="btn-group inline pull-left">
                        <a  href ='{{ url("teacher/list_subjstudent/$subject->subject_id") }}'>
                          <button class = 'btn btn-primary' title="ADD STUDENT"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                        </a> 

                        <a href ='{{ url("teacher/update_subject/$subject->subject_id") }}'>
                          <button class = 'btn btn-success' title="EDIT {{ $subject -> subjectName }}" > <i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                        </a>

                        <a href ='{{ url("teacher/list_student/delete/$subject->subject_id") }}' class="delete"  data-confirm="Are you sure to delete this item?">
                          <button id='delsubj' class = 'btn btn-danger' title="DELETE {{ $subject -> subjectName }} " ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
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
