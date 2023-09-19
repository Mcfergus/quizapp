@extends('backend.layouts.master')

@section('title', 'View Lesson')

@section('content')

<div class="span9">
                    <div class="content">

                        @if(Session::has('message'))

     		                <div class="alert alert-success">{{Session::get('message')}}</div>
                      	@endif

                    	
                        <div class="module">
                            <div class="module-head">
                                <h3>All Lessons</h3>
                            </div>

                            <div class="module-body">
                            	<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Title</th>
									  <th>Lesson</th>
									  <th>Notification</th>
									  <th>Description</th>
									  <th></th>
									  <th></th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
                                    @if(count($lessons)>0)
                                    @foreach($lessons as $lesson)
									<tr>
									  
									  <td>{{$lesson->title}}</td>
									  <td>{{$lesson->lesson}}</td>
									  <td>{{$lesson->notification}}</td>
									  <td>{{$lesson->description}}</td>
									  <td>
                      <a href="">
                        <button class="btn btn-inverse">View Lessons</button>
                      </a>
                    </td>
									  <td>

                                      <a href="{{route('lesson.edit', [$lesson->id])}}">
                                          
                                          <button class="btn btn-primary">Edit</button>
                                      </a>

                                      </td>


                                      <td>
                                      <form action="{{route('lesson.destroy',[$lesson->id])}}" method="POST" onsubmit="return confirmDelete()">@csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                            
                          </form>
                                      </td>

                            
									</tr>
                                    @endforeach
                                    
                                    @else
                                     <td>No Lessons to display</td>
                                   @endif

								
									
								  </tbody>
								</table>
                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 





@endsection