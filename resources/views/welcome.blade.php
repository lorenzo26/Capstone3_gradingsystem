@extends('layouts.app')

@section('content')

  @if (Auth::guest())
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

 <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }} 
<div class="container borderStudent">
  <h2>Have an account?</h2>
  <p>Log in to see all your collection.</p> 
    @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
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
      <input type="email" id="email" placeholder="email" name="email" class="form-control" >
      <button type="button" onclick="next('email');"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>

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
  @else
 @endif
@endsection
