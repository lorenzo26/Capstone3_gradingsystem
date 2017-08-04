@extends('template.master')


@section('content')

@if(Session::has('message'))  
    <script type="text/javascript">
      swal(
      'Grade have been Added!',
      '',
      'success',
      );
    </script>
  @endif
<section class="content-header">
 <h1>
           Add Grades
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/teacher/list_subject"> List of Subject</a></li>
         <li><a href="/teacher/list_subjstudent/{{$subject->subject_id}}"> List of Student in Subject</a></li>
        <li class="active">Add Grades </li>
      </ol> 
    </section>
    <div class="borderStudent">
     <h3 class="text-center">ADD Grade</h3>
        <div class="box box-info">
            <div class="box-header">
                <div class="panel-heading">
                   
                 
                </div><br>                    
                <div class="panel-body">

                    @if($subject->first_grading===null)

                        <label for="first">First Grading</label>
                        <select id="percent" name="percent"  class="form-control">
                        <option selected disabled="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        </select>

                    <div id="grades_container" class="panel-body">

                    </div>
                    <button class="btn btn-success" id="compute" onclick="compute()" disabled>Compute</button>  <hr>

                    <script type="text/javascript">

                        function compute(){
                            var finalScore = 0;
                            $('.grades').each(function(){
                            var totalScore = 0;
                            var maxScore = 0;
                            var weight = 100;

                            if(!isNaN($(this).children('select').first().val()))
                                weight = $(this).children('select').first().val()

                                $(this).find('input').each(function(){
                                
                                if($(this).hasClass('score')){
                                    totalScore += parseInt($(this).val())
                                }
                                else{
                                    maxScore += parseInt($(this).val())
                                }

                            })
                            
                            finalScore += (totalScore/maxScore)*(weight);

                            })
                            $('#first').val(finalScore)
                        }

                        $('#percent').change(function(){
                   
                            var content = '';
                        
                        for(var x=0; x<$(this).val();x++){
                             content += "<div> <div id='grades"+x+"' class='col-md-3 grades'><h3>PERECENT: "+(x+1)+"</h3><select onchange='verifyWeight();' class='percentage form-control' id='percetage"+x+"'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option><option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option><option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select><button onclick='createForm("+x+")' id='addBtn"+x+"' class='btn btn-primary'>ADD</button><br><li  class='list-group-item'><input type='number' class='score' name='score1'  min='1' max='999'   class='form-control'>/<input type='number' class='total'"+x+" name='total1' min='1' max='999'></div><input type='hidden' id='cnt"+x+"' value='1'></li></div>";
                        }
                        $('#grades_container').html(content);
                    })

                    function verifyWeight(){
                        var weight = 0;
                        $('.percentage').each(function(){
                    
                         weight += parseInt($(this).val())
                        console.log(weight);
                    })

                        if(parseInt(weight) != 100){
                            $('#compute').attr('disabled',true);
                        } else {
                            $('#compute').attr('disabled',false);
                            }
                        }

                        function createForm(x){
                         var cnt = $('#cnt'+x).val();
                            cnt++;
                            
                            $('#grades'+x).append('<li  class="list-group-item"><input type="number" class="score" name="score'+cnt+'"  min="1" max="999" >/<input type="number" name="total'+cnt+'"  min="1" max="999" ></li>');
                            $('#cnt'+x).val(cnt);
                        }
                    </script>
                    <div class="col-md-12">
                        <form method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="first" name="first" class="form-control" placeholder="First Grading">
                            </div>
                            <button class="btn btn-info">SUBMIT</button>
                        </form>
                    </div>
                    @else   
                     <a href='{{ url("/teacher/update_grade/$subject->student_id") }}/{{$subject->subject_id}}'><button class="btn btn-info">EDIT</button></a>
                    <div class="form-group">
                        <label for="first">First Grading</label>
                        <input type="text" name="first" class="form-control" placeholder="First Grading" value="{{$subject->first_grading}}%" readonly>
                    </div> 
                    <hr>
                    @endif 

                    @if ($subject->first_grading===null)
                    @else

                    @if($subject->second_grading===null)
                    <label for="first">Second Grading</label>
                        <select id="percent" name="percent"  class="form-control">
                        <option selected disabled="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        </select>

                    <div id="grades_container" class="panel-body">

                    </div>
                    <button class="btn btn-success" id="compute" onclick="compute()" disabled>Compute</button>  <hr>

                    <script type="text/javascript">

                        function compute(){
                            var finalScore = 0;
                            $('.grades').each(function(){
                            var totalScore = 0;
                            var maxScore = 0;
                            var weight = 100;

                            if(!isNaN($(this).children('select').first().val()))
                                weight = $(this).children('select').first().val()

                                $(this).find('input').each(function(){
                                
                                if($(this).hasClass('score')){
                                    totalScore += parseInt($(this).val())
                                }
                                else{
                                    maxScore += parseInt($(this).val())
                                }

                            })
                            
                            finalScore += (totalScore/maxScore)*(weight);

                            })
                            $('#second').val(finalScore)
                        }

                        $('#percent').change(function(){
                   
                            var content = '';
                        
                        for(var x=0; x<$(this).val();x++){
                             content += "<div> <div id='grades"+x+"' class='col-md-3 grades'><h3>PERECENT: "+(x+1)+"</h3><select onchange='verifyWeight();' class='percentage form-control' id='percetage"+x+"'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option><option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option><option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select><button onclick='createForm("+x+")' id='addBtn"+x+"' class='btn btn-primary'>ADD</button><br><li  class='list-group-item'><input type='number' class='score' name='score1'  min='1' max='999'   class='form-control'>/<input type='number' class='total'"+x+" name='total1' min='1' max='999'></div><input type='hidden' id='cnt"+x+"' value='1'></li></div>";
                        }
                        $('#grades_container').html(content);
                    })

                    function verifyWeight(){
                        var weight = 0;
                        $('.percentage').each(function(){
                    
                         weight += parseInt($(this).val())
                        console.log(weight);
                    })

                        if(parseInt(weight) != 100){
                            $('#compute').attr('disabled',true);
                        } else {
                            $('#compute').attr('disabled',false);
                            }
                        }

                        function createForm(x){
                         var cnt = $('#cnt'+x).val();
                            cnt++;
                            
                            $('#grades'+x).append('<li  class="list-group-item"><input type="number" class="score" name="score'+cnt+'"  min="1" max="999" >/<input type="number" name="total'+cnt+'"  min="1" max="999" ></li>');
                            $('#cnt'+x).val(cnt);
                        }
                    </script>
                    <div class="col-md-12">
                        <form  method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="second" name="second" class="form-control" placeholder="Second Grading">
                            </div>
                        <button class="btn btn-info">SUBMIT</button>
                        </form>
                    </div>
                    @else                        
                    <div class="form-group">
                        <label for="first">Second Grading</label>
                        <input type="text" name="second" class="form-control" placeholder="Second Grading" value="{{$subject->second_grading}}%" readonly>
                    </div><hr>

                    @endif 
                    @endif



                    @if ($subject->second_grading===null)

                    @else 

                    @if($subject->third_grading===null)
                    <label for="first">First Grading</label>
                        <select id="percent" name="percent"  class="form-control">
                        <option selected disabled="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        </select>

                    <div id="grades_container" class="panel-body">

                    </div>
                    <button class="btn btn-success" id="compute" onclick="compute()" disabled>Compute</button>  <hr>

                    <script type="text/javascript">

                        function compute(){
                            var finalScore = 0;
                            $('.grades').each(function(){
                            var totalScore = 0;
                            var maxScore = 0;
                            var weight = 100;

                            if(!isNaN($(this).children('select').first().val()))
                                weight = $(this).children('select').first().val()

                                $(this).find('input').each(function(){
                                
                                if($(this).hasClass('score')){
                                    totalScore += parseInt($(this).val())
                                }
                                else{
                                    maxScore += parseInt($(this).val())
                                }

                            })
                            
                            finalScore += (totalScore/maxScore)*(weight);

                            })
                            $('#third').val(finalScore)
                        }

                        $('#percent').change(function(){
                   
                            var content = '';
                        
                        for(var x=0; x<$(this).val();x++){
                             content += "<div> <div id='grades"+x+"' class='col-md-3 grades'><h3>PERECENT: "+(x+1)+"</h3><select onchange='verifyWeight();' class='percentage form-control' id='percetage"+x+"'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option><option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option><option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select><button onclick='createForm("+x+")' id='addBtn"+x+"' class='btn btn-primary'>ADD</button><br><li  class='list-group-item'><input type='number' class='score' name='score1'  min='1' max='999'   class='form-control'>/<input type='number' class='total'"+x+" name='total1' min='1' max='999'></div><input type='hidden' id='cnt"+x+"' value='1'></li></div>";
                        }
                        $('#grades_container').html(content);
                    })

                    function verifyWeight(){
                        var weight = 0;
                        $('.percentage').each(function(){
                    
                         weight += parseInt($(this).val())
                        console.log(weight);
                    })

                        if(parseInt(weight) != 100){
                            $('#compute').attr('disabled',true);
                        } else {
                            $('#compute').attr('disabled',false);
                            }
                        }

                        function createForm(x){
                         var cnt = $('#cnt'+x).val();
                            cnt++;
                            
                            $('#grades'+x).append('<li  class="list-group-item"><input type="number" class="score" name="score'+cnt+'"  min="1" max="999" >/<input type="number" name="total'+cnt+'"  min="1" max="999" ></li>');
                            $('#cnt'+x).val(cnt);
                        }
                    </script>
                    <div class="col-md-12">
                        <form method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="third" name="third" class="form-control" placeholder="Third Grading">
                            </div>
                        <button class="btn btn-info">SUBMIT</button>
                        </form>
                    </div>

                    @else                     
                    <div class="form-group">
                        <label for="third">Third Grading</label>
                        <input type="text" name="third" class="form-control" placeholder="Third Grading" value="{{$subject->third_grading}}%" readonly>
                    </div><hr>                          

                    @endif 
                    @endif 

                    @if ($subject->third_grading===null)

                    @else 

                    @if($subject->fourth_grading===null)
                    <label for="first">First Grading</label>
                        <select id="percent" name="percent"  class="form-control">
                        <option selected disabled="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        </select>

                    <div id="grades_container" class="panel-body">

                    </div>
                    <button class="btn btn-success" id="compute" onclick="compute()" disabled>Compute</button>  <hr>

                    <script type="text/javascript">

                        function compute(){
                            var finalScore = 0;
                            $('.grades').each(function(){
                            var totalScore = 0;
                            var maxScore = 0;
                            var weight = 100;

                            if(!isNaN($(this).children('select').first().val()))
                                weight = $(this).children('select').first().val()

                                $(this).find('input').each(function(){
                                
                                if($(this).hasClass('score')){
                                    totalScore += parseInt($(this).val())
                                }
                                else{
                                    maxScore += parseInt($(this).val())
                                }

                            })
                            
                            finalScore += (totalScore/maxScore)*(weight);

                            })
                            $('#fourth').val(finalScore)
                        }

                        $('#percent').change(function(){
                   
                            var content = '';
                        
                        for(var x=0; x<$(this).val();x++){
                             content += "<div> <div id='grades"+x+"' class='col-md-3 grades'><h3>PERECENT: "+(x+1)+"</h3><select onchange='verifyWeight();' class='percentage form-control' id='percetage"+x+"'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option><option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option><option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select><button onclick='createForm("+x+")' id='addBtn"+x+"' class='btn btn-primary'>ADD</button><br><li  class='list-group-item'><input type='number' class='score' name='score1'  min='1' max='999'   class='form-control'>/<input type='number' class='total'"+x+" name='total1' min='1' max='999'></div><input type='hidden' id='cnt"+x+"' value='1'></li></div>";
                        }
                        $('#grades_container').html(content);
                    })

                    function verifyWeight(){
                        var weight = 0;
                        $('.percentage').each(function(){
                    
                         weight += parseInt($(this).val())
                        console.log(weight);
                    })

                        if(parseInt(weight) != 100){
                            $('#compute').attr('disabled',true);
                        } else {
                            $('#compute').attr('disabled',false);
                            }
                        }

                        function createForm(x){
                         var cnt = $('#cnt'+x).val();
                            cnt++;
                            
                            $('#grades'+x).append('<li  class="list-group-item"><input type="number" class="score" name="score'+cnt+'"  min="1" max="999" >/<input type="number" name="total'+cnt+'"  min="1" max="999" ></li>');
                            $('#cnt'+x).val(cnt);
                        }
                    </script>
                    <div class="col-md-12">
                        <form method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" id="fourth" name="fourth" class="form-control" placeholder="Fourth Grading">
                            </div>
                        <button class="btn btn-info">SUBMIT</button>
                        </form>
                    </div>
                    @else                       
                    <div class="form-group">
                        <label for="fourth">Fourth Grading</label>
                        <input type="text" name="fourth" class="form-control" placeholder="Fourth Grading" value="{{$subject->fourth_grading}}%" readonly>
                    </div>
                      
                    @endif 

                    @endif 


                </div>
            </div>
        </div>
    </div>

@endsection
