@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['taskController@destroy', $task->id], 'class'=> 'form-horizontal']) !!} 
		<a href="{{ action('taskController@edit', $task->id) }}" class="btn btn-info btn-md" role="button">Modified</a>
		 <button type="submit" class="btn btn-danger">Delete</button>
		 <input type="hidden" id="taskId" name="back" value="back">
		{!! Form::close() !!}
		<hr>
	</div>
	<div class="col-sm-offset-0 col-sm-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">Task Id</label>
					<div class="col-sm-10">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $task->id }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Task</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $task->name }}" disabled />
					</div>
				</div>
			</form>
	</div>


@endsection

