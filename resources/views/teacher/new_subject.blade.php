@extends('template.master')


@section('content')

<section class="content-header">
      <h1>
        Create Subject
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Subject</li>
      </ol>
    </section>
    
        <div class="container">
            <div class="col-md-5 col-md-offset-3">
                
                <form action="{{url('/teacher/new-subjectHandler/')}}" method="post">
                <div class="panel panel-info">
                   
                    <div class="panel-body">
                       
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subjname">Subject Name</label>
                        <input type="text" name="subjname" class="form-control" placeholder="Subject Name">
                    </div>

                    <div class="form-group">
                        <label for="year">Subject year</label>
                        <select class="form-control" name="year">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  
</select>
                    </div>
                    
                    <button class="btn btn-info">SUBMIT</button>
                </form>
                    </div>
                </div>
                
            </div>
        </div>



@endsection
