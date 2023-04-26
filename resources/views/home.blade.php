@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Session::has('error'))
         <div class="alert alert-danger">{{Session::get('error')}}</div>

        @endif
        <div class="col-md-8">
            <div class="card">
                <!-- <example-component></example-component> -->
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if($isExamAssigned)
                @foreach($quizzes as $quiz)

                <div class="card-body">
                   <p><h3>{{$quiz->name}}</h3></p>
                   <p>About Exam:{{$quiz->description}}</p>
                   <p>Time allocated:{{$quiz->minutes}} minutes</p>
                   <p>Number of questions:{{$quiz->questions->count()}}</p>
                   <p>

                      @if(!in_array($quiz->id,$wasQuizCompleted))

                      <a href="/quiz/{{$quiz->id}}">
                        <button class="btn btn-success">Start Quiz</button>
                      </a>
                      @else
                      <span style="float:right;" class="float-right">Completed</span>
                      @endif

                   </p>
                </div>
                @endforeach
                @else
                <p>You have not been assigned any exam</p>

                @endif
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</div>
@endsection
