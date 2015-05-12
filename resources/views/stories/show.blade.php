@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['storyController@destroy', $story->id], 'class'=> 'form-horizontal']) !!} 
			<a href="{{ action('storyController@edit', $story->id) }}" class="btn btn-info btn-md" role="button">Modified</a>
		 	<button type="submit" class="btn btn-danger">Delete</button>
			<a href="{{ action('taskController@create',  ["storyId" => $story->id]) }}" class="btn btn-info btn-md" role="button">Create New Task</a>
			<input type="hidden" id="back" name="back" value="back">
		{!! Form::close() !!}
		<hr>
	</div>
	<div class="col-sm-offset-0 col-sm-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">Story Id</label>
					<div class="col-sm-10">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $story->id }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Story Name</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $story->name }}" disabled />
					</div>
				</div>
			</form>
	</div>			
	<div class="col-sm-12 column">		
		<hr>
	</div>
	
	<div class="col-sm-offset-0 col-sm-12 column">							
		<table class="table">
			<thead>
				<tr>
					<th>
						No
					</th>
					<th>
						Task
					</th>
					<th>
						Last Updated Time
					</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tasks as $task)
				<tr>
					<td>
						<a href="{{ url('/task', $task->id) }}">{{ $task->id }}</a>
					</td>
					<td>
						<a href="{{ url('/task', $task->id) }}">{{ $task->name }}</a>
					</td>
					<td>
						{{ $task->updated_at }}
					</td>
				</tr>
			@endforeach			
			</tbody>
		</table>
	</div>
@endsection

	