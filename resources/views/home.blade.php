@extends('template.master')

@section('content')

   @if(Auth::user()->role==='Teacher')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
        You are logged in!

        </div>
    </div>


@else

<section class="content-header">
      <h1>
        User Profile
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Profile</li>
      </ol>
    </section>

  <div class="row">
    <section class="col-lg-5 col-md-5 col-xl-5">
      <div class="box box-primary">
        <div class="box-body box-profile">
           
            @if (Auth::user()->Students->avatar==='')
                @if (Auth::user()->Students->gender==="Male")
                <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                @else
                <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                @endif
            @else         
             <img class="image-round" src="../../{{Auth::user()->Students->avatar}}" alt="avatar">    
            @endif
          <h3 class="profile-username text-center"></h3>
          <p class="text-muted text-center"></p>          
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Gender</b> <a class="pull-right">{{ Auth::user()->Students->gender}}</a>
            </li>
            <li class="list-group-item">
              <b>Address</b> <a class="pull-right">{{ Auth::user()->Students->address}}</a>
            </li>
            <li class="list-group-item">
              <b>Member Since</b> <a class="pull-right">{{ Auth::user()->created_at}}</a>
            </li>
          </ul>
          <form method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <input type="file" name="f1" accept="image/*" required><br>
            <input type="hidden" name="id" value="{{ Auth::user()->id}}"><br>         
            <button type="submit" class="pull-right btn btn-default" name="uplogo">Update Avatar
                <i class="fa fa-arrow-circle-up"></i>
            </button>
          </form>
        </div>
      </div>
    </section>
    <section class="col-lg-7 col-md-7 col-xl-7">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <h3>User Information</h3>
          <form method="post">
          {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->Students->lname}}" placeholder="Enter your lastname" required>
              <input type="text" class="form-control" name="firstname" value="{{ Auth::user()->Students->fname}}" placeholder="Enter your firstname" required>
              <input type="text" class="form-control" name="middlename" value="{{ Auth::user()->Students->mname}}" placeholder="Enter your middlename" required>    
              <input type="text" class="form-control" name="address" value="{{ Auth::user()->Students->address}}" placeholder="Enter your address" required>          
              <input type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" placeholder="Enter your email" required>
              <input type="hidden" name="id" value="{{ Auth::user()->id}}"><br>           
              <!-- <input type="password" class="form-control" id="password" name="newpass"  placeholder="New Password">    
              <input type="password" class="form-control" id="confirm_password" name="conpass"  placeholder="confirm new password"> -->
            </div>      
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="upschool">Update Information
                <i class="fa fa-arrow-circle-up"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>    
  </div>
@endif

@endsection
