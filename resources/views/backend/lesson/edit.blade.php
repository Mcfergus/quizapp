@extends('backend.layouts.master')

@section('title', 'edit Lesson')

@section('content')

<div class="span9">
<div class="content">


@if(Session::has('message'))

<div class="alert alert-success">{{Session::get('message')}}</div>


@endif



<form action="{{route('lesson.update', [$lessons->id])}}" method="POST">@csrf
{{method_field('PUT')}}

<div class="module">
    <div class="module-head">
        <h3> Edit Lesson</h3>
    </div>
    
    <div class="module-body">

            <div class="control-group">
				<label class="control-lable" for="title">Lesson Name</label>
				<div class="controls"> 
					<input type="text" name="title" class="span8 @error('name') border-red @enderror" placeholder="name of a lesson" value="  {{$lessons->title}}  " >
				</div>
			     @error('name')
			    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
			    @enderror      

			</div>



            <div class="control-group">
				<label class="control-lable" for="name">Lesson</label>
				<div class="controls">
                <input type="text" name="lesson" class="span8 @error('lesson') border-red @enderror" placeholder="lesson" value="  {{$lessons->lesson}}  " >
				</div>
			        @error('lesson')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
			       @enderror

			</div>


            <div class="control-group">
				<label class="control-lable" for="name">Notification</label>
				<div class="controls">
                <input type="text" name="notification" class="span8 @error('notification') border-red @enderror" placeholder="notification" value="  {{$lessons->notification}}  " >
				</div>
			        @error('notification')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
			       @enderror

			</div>

            <div class="control-group">
				<label class="control-lable" for="name">Description</label>
				<div class="controls">
					<textarea name="description" class="span8 @error('description') is-invalid @enderror">  {{$lessons->description}} </textarea>
				</div>
			        @error('description')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
			       @enderror

			</div>





            <div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>

		    </div>

        </div>

        
    </div>
</div>
</form>

</div>
</div>

@endsection