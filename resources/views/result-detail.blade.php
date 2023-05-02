@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
         <center><h2>Your Results</h2></center>
         @foreach($results as $key=>$result)
         <div class="card">
             <div class="card-header">{{$key+1}}</div>
             <div class="card-body">
                <p>
                    
                    @if(isset($result->question))

                        <h2>{{$result->question['question']}}</h2>
                    
                    @else
                        <h2>No question found</h2>
                    @endif
                  
                </p>
                @php
                 $i = 1;


                 $answers = DB::table('answers')->where('question_id',$result->question_id)->get();
                 foreach($answers as $ans){
                    echo '<p>'.$i++.')' .$ans->answer. '</p>';
                 }
                @endphp
                @if(isset($result->answer))
                <p> 
                    <mark>Your Answer: {{$result->answer['answer']}}</mark>

                </p>
                @endif

                @php

                   $correctAnswers = DB::table('answers')->where('question_id',$result->question_id)->where('is_correct',1)->get();
                   foreach($correctAnswers as $ans){
                    echo "Correct Answer: ".$ans->answer;
                   }
                @endphp
                
             </div>
         </div>
          @endforeach
       </div>
    </div>
</div>
@endsection    