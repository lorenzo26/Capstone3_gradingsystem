@extends('layouts.app')

@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                                <input id="id" type="id" class="form-control" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->

 <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }} 
<div class="container borderStudent">
  <h2>Have an account?</h2>
  <p>Log in to see all your collection.</p> 
   
  <div class="cube" id="cube">

    <div class="front" onclick="next('');">
     Login
    </div>
    <div class="top">
      <i class="fa fa-key"></i>
      <input type="password" id="password" placeholder="password" name="password" class="form-control" > 
      <button type="submit" onclick="next('password');"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>      
    </div>
    <div class="back">
      <i class="fa fa-user"></i>
      <input type="text" id="username" placeholder="username" name="id" class="form-control" >
      <button type="button" onclick="next('username');"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
    </div>
    <div class="bottom">
      <div class="loading-animation">
          <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div>
        </div>  
    </div>
  </div>  

</div>
  </form>
<script type="text/javascript">
    var itr=1;
function next(id){
  if(id == ''){
  } else {
    var text =  document.getElementById(id).value;
    console.log(text);
    if(text.length < 3){
      add_remove_effects(document.getElementById(id).parentElement,'empty');
      return ;
    }
  }
  document.getElementById('cube').style.transform = "translateZ(-25px) rotateX("+(itr*90)+"deg)";
  itr++;
}


var add_remove_effects = function(ref,classname){
  var $a = ref.classList.add(classname);
  $a = ref;
  var $b = classname;
    setTimeout(function(){
      $a.classList.remove($b);
    },450);     
}

</script>
@endsection
