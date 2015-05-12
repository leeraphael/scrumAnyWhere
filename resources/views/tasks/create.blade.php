@extends('app')

@section('main')
<h3>Create New Task</h3>
<hr>
{!! Form::open(['url'=>'task', 'class'=>'form-horizontal']) !!} 
	<input type="hidden" id="projectId" name="storyId" value="{{ $story->id }}">
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Story</label>
		<div class="col-sm-10">
			<input type="name" class="form-control" id="storyName" name="storyName" value="{{ $story->name }}" disabled>
		</div>			
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Task</label>
		<div class="col-sm-10">
			<input type="name" class="form-control" id="name" name="name" placeholder="Enter Task name">
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8 ">
			<a href="{{ URL::previous() }}" class="btn btn-info btn-md" role="button">Back</a>
			<button type="submit" class="btn btn-default">Add</button>
			<button type="submit" class="btn btn-default" name="continue" value="true">Add and Continue</button>
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
{!! Form::close() !!}

@endsection

