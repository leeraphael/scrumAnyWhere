@extends('app')

@section('main')	
<h3>Edit Task</h3>
<hr>
	{!! Form::open(['method'=>'PUT', 'action' => ['taskController@update', $task->id], 'class'=> 'form-horizontal']) !!} 
	<div class="form-group">
		 <label for="taskId" class="col-sm-2 control-label">Task Id</label>
		<div class="col-sm-3">
			<input type="id" class="form-control" id="taskId" value="{{ $task->id }}" disabled />
		</div>
	</div>
	<div class="form-group">
		 {!! Form::label('name', 'Task', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('name', $task->name, ['class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Man Day</label>
		<div class="col-sm-2">
			{!!	Form::selectRange('manDay', 1, 10, $task->manDay, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Color</label>
		<div class="col-sm-2">
			{!!	Form::select('color', array('Y' => 'Yellow', 'B' => 'Blue'), $task->color, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-5">
		<textarea class="form-control" id="name" name="desc">{{ $task->desc }}</textarea>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8 ">
			<a href="{{ URL::previous() }}" class="btn btn-info btn-md" role="button">Back</a>
			<button type="submit" class="btn btn-default">Save</button>
		</div>
	</div>
	@if ($errors->any())
	<div class="form-group">
		<div class="col-sm-12 ">
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)
					<li> {{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>	
	@endif				
	</div>
	
{!! Form::close() !!}
@endsection

