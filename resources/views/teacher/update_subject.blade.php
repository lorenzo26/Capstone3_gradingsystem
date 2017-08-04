@extends('template.master')


@section('content')
<section class="content-header">

  @if(Session::has('message'))  
    <script type="text/javascript">
      swal(
      'Subject have been Updated!',
      '',
      'success',
      );
    </script>
  @endif
 <h1>
        Update Created Subject
      
      </h1>
      <ol class="breadcrumb"> 
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teacher/list_subject"> List of Subject</a></li>
        <li class="active"> Update Created Subject</li>
      </ol>
    </section>

  <div class="borderStudent">
    <section class="content-header">
      
      <section class = "content">
        <div class="row">
          <section class="col-lg-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title"> {{$subject->subjectName}}</h3>
              </div>
              <form method="post">
               
                   <div>
                  
                       
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subjname">Subject Name</label>
                        <input type="text" name="subjname" class="form-control" placeholder="Subject Name" value="{{$subject->subjectName}}">
                    </div>

                     <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" placeholder="Subject  Year" value="{{$subject->year}}" readonly="">
                    </div>

                    <div class="form-group">
                       
                        <select class="form-control" name="year">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  
</select>
                    </div>
                    
                    <button name="update" class="btn btn-info">SUBMIT</button>
                    </div>
                </form>
          
            </div>
          </section>
        </div>
      </section>
    </section>
  </div>




@endsection
