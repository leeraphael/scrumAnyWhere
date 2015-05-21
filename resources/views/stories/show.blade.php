@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['storyController@destroy', $story->id], 'class'=> 'form-horizontal']) !!} 
			<a href="{{ URL::previous() }}" class="btn btn-default" role="button">Back</a>
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
					<div class="col-sm-3">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $story->id }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Story Name</label>
					<div class="col-sm-3">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $story->name }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-2">
					{!! Form::input('date', 'startDate',  $story->startDate, ['class' => 'form-control', 'disabled']) !!}
					</div>
				</div>	
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Man Day</label>
					<div class="col-sm-2">
						{!!	Form::selectRange('manDay', 1, 10, $story->manDay, ['class' => 'form-control', 'disabled']) !!}
					</div>
				</div>	
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-5">
					<textarea class="form-control" id="desc" name="desc">{{$story->desc}}</textarea>
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

	