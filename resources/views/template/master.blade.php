
<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONLINE GRADING SYSTEM</title>


    <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <script src="{{URL::to('assets/jquery/jquery-2.2.3.min.js')}}"></script>


    

</head>
<body onload="myFooter()">

        
    <button onclick="topFunction()" class="btn btn-info" id="myBtn" title="Go to top">Top</button>
    <nav class="navbar-default" >
        <div class="nav-side-menu">
            <div class="brand">ONLINE GRADING SYSTEM
            </div>
            <div class="navbar-header">
                <button class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></button>
            </div>   
            <div class="divAvatar"> 

        @if (Auth::user()->role==="Teacher")
            @if (Auth::user()->teachers->avatar==='')
                @if (Auth::user()->teachers->gender==="Male")
                <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                @else
                <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                @endif
            @else         
              <img class="image-round" src="../../../{{Auth::user()->teachers->avatar}}" alt="avatar">  
            @endif

                <h4>{{ Auth::user()->teachers->fname}} </h4>
                
                <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6>
            </div> 
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">     
                     <div class="main-nav"><span>Main Navigation</span></div>
                    <li>
                        <a href="{{ url('/home') }}">HOME</a>
                    </li>
                    <li data-toggle="collapse" data-target="#subject" class="collapsed">
                        <a href="#">Subjects</a>
                    </li>
                    <ul class="sub-menu collapse" id="subject">
                        <li><a href="{{ url('teacher/new_subject') }}">Create Subjects</a></li>
                        <li><a href="{{ url('teacher/list_subject/') }}">Customize Subjects</a></li>
                    </ul>
                    
                    
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle button-log-prof" type="button" data-toggle="dropdown">
                @if (Auth::user()->teachers->avatar==='')
                    @if (Auth::user()->teachers->gender==="Male")
                    <img class="image-round  dropdown_avatar" src="{{URL::to('assets/images/avatar.png')}}">
                    @else
                    <img class="image-round  dropdown_avatar" src="{{URL::to('assets/images/avatar3.png')}}">
                    @endif
                @else         
                      <img class="image-round dropdown_avatar" src="../../../{{Auth::user()->teachers->avatar}}" alt="avatar">   
                @endif
               
                <span class="name"> {{ Auth::user()->teachers->fname}}</span>
                <span class="caret"></span></button>
                 <div class="dropdown-menu ">
                    @if (Auth::user()->teachers->avatar==='')
                        @if (Auth::user()->teachers->gender==="Male")
                        <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                        @else
                        <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                        @endif
                    @else         
                       <img class="image-round" src="../../../{{Auth::user()->teachers->avatar}}" alt="avatar">   
                    @endif
                    <h4 class="name2"> {{ Auth::user()->teachers->fname}}</h4>
                    <h6>{{ Auth::user()->id}}</h6>  
                    <hr>
                    <a class="profile btn btn-default btn-flat" href="{{ url('/teacher/profile')}}/{{Auth::user()->id }}">Profile</a>
                   <a class="profile btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
            </div>
        </div>
    </nav>

            @else
                @if (Auth::user()->students->avatar==='')
                @if (Auth::user()->students->gender==="Male")
                <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                @else
                <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                @endif
            @else         
             <img class="image-round" src="../../../{{Auth::user()->students->avatar}}" alt="avatar">     
            @endif

                <h4>{{ Auth::user()->students->fname}} </h4>
                
                <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6>
                <h5>{{ Auth::user()->students->section}}</h5>
            </div> 
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">     
                     <div class="main-nav"><span>Main Navigation</span></div>
                    <li>
                        <a href="{{ url('/home') }}">HOME</a>
                    </li>
                    <li data-toggle="collapse" data-target="#subject" class="collapsed">
                        <a href="#">Grades</a>
                    </li>
                    <ul class="sub-menu collapse" id="subject">
                        <li><a href="{{ url('student/grades') }}/{{ Auth::user()->id}}">Grades</a></li>
                        
                    </ul>
                    
                    
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle button-log-prof" type="button" data-toggle="dropdown">
                @if (Auth::user()->students->avatar==='')
                    @if (Auth::user()->students->gender==="Male")
                    <img class="image-round  dropdown_avatar" src="{{URL::to('assets/images/avatar.png')}}">
                    @else
                    <img class="image-round  dropdown_avatar" src="{{URL::to('assets/images/avatar3.png')}}">
                    @endif
                @else         
                    
                    <img class="image-round dropdown_avatar" src="../../../{{Auth::user()->students->avatar}}" alt="avatar">    
                @endif
               
                <span class="name"> {{ Auth::user()->students->fname}}</span>
                <span class="caret"></span></button>
                 <div class="dropdown-menu ">
                    @if (Auth::user()->students->avatar==='')
                        @if (Auth::user()->students->gender==="Male")
                        <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                        @else
                        <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                        @endif
                    @else         
                       <img class="image-round" src="../../../{{Auth::user()->students->avatar}}" alt="avatar">      
                    @endif
                    <h4 class="name2"> {{ Auth::user()->students->fname}}</h4>
                    <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6>  
                    <h5>{{ Auth::user()->students->section}}</h5>
                    <hr>
                    <a class="profile btn btn-default btn-flat" href="#">Profile</a>
                   <a class="profile btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div>
            </div>
        </div>
    </nav>

            @endif

  
    <script src="{{URL::to('assets/javascript/footer.js') }}"></script>   
    <script src="{{URL::to('js/bootstrap.min.js') }}"></script> 
</body>
</html> -->



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ONLINE GRADING SYSTEM</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">
  <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{URL::to('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('css/skins/_all-skins.min.css')}}">
  <script src="{{URL::to('assets/jquery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{URL::to('js/app.min.js')}}"></script>
  <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini"  onload="myFooter()">
  <div class="wrapper">
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini">OGS</span>
        <span class="logo-lg"><b>GRADING</b> System</span>
      </a>

      @if (Auth::user()->role==="Teacher")
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
                <span class="hidden-xs">{{ Auth::user()->teachers->fname}} </span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">

                  @if (Auth::user()->teachers->avatar==='')
                    @if (Auth::user()->teachers->gender==="Male")
                      <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                    @else
                      <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                    @endif
                  @else         
                    <img class="image-round" src="../../../{{Auth::user()->teachers->avatar}}" alt="avatar">  
                  @endif

                  <p>
                  <h5>{{ Auth::user()->teachers->fname}} </h5>
                  <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6><br>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a class="profile btn btn-default btn-flat" href="{{ url('/teacher/profile')}}/{{Auth::user()->id }}">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="profile btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">

            @if (Auth::user()->teachers->avatar==='')
              @if (Auth::user()->teachers->gender==="Male")
                <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
              @else
                <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
              @endif
            @else         
              <img class="image-round" src="../../../{{Auth::user()->teachers->avatar}}" alt="avatar">  
            @endif
          </div>
          <div class="pull-left info">
            <h5>{{ Auth::user()->teachers->fname}} </h5>
            <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6><br>
          </div>
        </div><br>
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="{{ url('/home') }}">
              <i class="fa fa-home"></i>
            <span>HOME</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Activity</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('teacher/new_subject') }}"><i class="fa fa-circle-o"></i>Create Subjects</a></li>
              <li><a href="{{ url('teacher/list_subject/') }}"><i class="fa fa-circle-o"></i>Customize Subjects</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Examination</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="http://online-learning-system.comeze.com/"><i class="fa fa-circle-o"></i>Online Exam</a></li>
          </li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
     
       
        @yield('content')
     
      
    </div>
  </div>

@else
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">{{ Auth::user()->students->fname}} </span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">

                  @if (Auth::user()->students->avatar==='')
                    @if (Auth::user()->students->gender==="Male")
                      <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
                    @else
                      <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
                    @endif
                  @else         
                    <img class="image-round" src="../../../{{Auth::user()->students->avatar}}" alt="avatar">  
                  @endif

                  <p>
                  <h5>{{ Auth::user()->students->fname}} </h5>
                  <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6><br>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a class="profile btn btn-default btn-flat" href="/home">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="profile btn btn-default btn-flat" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">

            @if (Auth::user()->students->avatar==='')
              @if (Auth::user()->students->gender==="Male")
                <img class="image-round" src="{{URL::to('assets/images/avatar.png')}}">
              @else
                <img class="image-round" src="{{URL::to('assets/images/avatar3.png')}}">
              @endif
            @else         
              <img class="image-round" src="../../../{{Auth::user()->students->avatar}}" alt="avatar">  
            @endif
          </div>
          <div class="pull-left info">
            <h5>{{ Auth::user()->students->fname}} </h5>
            <h6>{{ Auth::user()->id}},{{ Auth::user()->role}}</h6><br>
          </div>
        </div><br>
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="{{ url('/home') }}">
            <i class="fa fa-home"></i>
            <span>HOME</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Grades</span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{ url('student/grades') }}/{{ Auth::user()->id}}"><i class="fa fa-circle-o"></i>Grades</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Examination</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="http://online-learning-system.comeze.com/"><i class="fa fa-circle-o"></i>Online Exam</a></li>
          </li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
     
       
        @yield('content')
       
    </div>
  </div>



@endif
<script src="{{URL::to('assets/javascript/footer.js') }}"></script>  
</body>
</html>
