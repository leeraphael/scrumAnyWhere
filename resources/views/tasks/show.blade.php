@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['taskController@destroy', $task->id], 'class'=> 'form-horizontal']) !!} 			
			<a href="{{ URL::previous() }}" class="btn btn-default" role="button">Back</a>
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
					<div class="col-sm-3">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $task->id }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Task</label>
					<div class="col-sm-3">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $task->name }}" disabled />
					</div>
				</div>				
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Man Day</label>
					<div class="col-sm-2">
						{!!	Form::selectRange('manDay', 1, 10, $task->manDay, ['class' => 'form-control', 'disabled'=>'']) !!}
					</div>
				</div>	
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-2">
						{!!	Form::select('color', array('Y' => 'Yellow', 'B' => 'Blue'), $task->color, ['class' => 'form-control', 'disabled'=>'']) !!}
					</div>
				</div>	
				<div class="form-group">
					 <label for="name" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-5">
					<textarea class="form-control" id="name" name="desc" disabled >{{ $task->desc }}</textarea>
					</div>
				</div>	
			</form>
	</div>


@endsection

