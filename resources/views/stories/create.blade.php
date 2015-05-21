@extends('app')

@section('main')
<h3>Create New Story</h3>
<hr>
{!! Form::open(['url'=>'story', 'class'=>'form-horizontal']) !!} 	
	<input type="hidden" id="projectId" name="projectId" value="{{ $project->id }}">
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Project</label>
		<div class="col-sm-3">
			<input type="name" class="form-control" id="projectName" name="projectName" value="{{ $project->name }}" disabled>
		</div>			
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Story</label>
		<div class="col-sm-3">
			<input type="name" class="form-control" id="name" name="name" placeholder="Enter story name">
		</div>
	</div>			
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Start Date</label>
		<div class="col-sm-2">
		{!! Form::input('date', 'startDate', 0, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Man Day</label>
		<div class="col-sm-2">
			{!!	Form::selectRange('manDay', 1, 10, 2, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-5">
		<textarea class="form-control" id="desc" name="desc"></textarea>
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

