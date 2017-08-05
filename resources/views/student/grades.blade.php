@extends('template.master')


@section('content')    


<section class="content-header">
      <h1>
        GRADES
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">GRADES</li>
      </ol>
    </section>
  <div class="borderStudent">
    <section class="content-header">    
      <section class = "content">
        <div class="row">
          <section class="col-lg-12">
           
              <div class="box-header">
                <h3 class="box-title">Grades found on Database</h3>
              </div>
              <div class="box-body"> 
             
                <table class="table"> 
                  <tbody>
                    <tr>      
                            
                      <th>Descriptive Title</th>
                      <th>Year</th>
                      <th>1st</th>
                      <th>2nd</th>
                      <th>3rd</th>
                      <th>4th</th>
                      <th>Total</th>
                           
                                           
                    </tr>
                  </tbody>
                  <tbody>
         @foreach($student->subjects as $subject)
         
                      <tr>
                        <td>{{$subject->subjectName}}                       
                          </td>
                          <td>{{$subject->year}}                       
                          </td>
                        <td>
                        @if ($subject->pivot->first_grading===null)
                          <p>Not Available</p>
                          @else
                      {{$subject->pivot->first_grading}}
                        @endif                       
                          </td>
                          <td>
                            @if ($subject->pivot->second_grading===null)
                          <p>Not Available</p>
                          @else{{$subject->pivot->second_grading}} 
                          @endif                         
                          </td>
                          <td>
                            @if ($subject->pivot->third_grading===null)
                          <p>Not Available</p>
                          @else{{$subject->pivot->third_grading}}
                          @endif                          
                          </td>
                          <td>
                            @if ($subject->pivot->fourth_grading===null)
                          <p>Not Available</p>
                          @else{{$subject->pivot->fourth_grading}}
                          @endif                          
                          </td>
                           <td>
                           @if ($subject->pivot->fourth_grading===null)
                          <p>Not Available</p>
                          @else

                          {{round((($subject->pivot->first_grading + $subject->pivot->second_grading + $subject->pivot->third_grading + $subject->pivot->fourth_grading)/4),0)}}
                          @endif                          

                          </td>
                           
                    </tr> @endforeach  
               
                  </tbody>
                </table>
              </div>
            
          </section>
        </div>
      </section>
    </section>
  </div>




@endsection
