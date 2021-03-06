@extends('app')

@section('main')
<h3>Create New Project</h3>
<hr>
{!! Form::open(['url'=>'project', 'class'=>'form-horizontal']) !!} 
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Project</label>
		<div class="col-sm-3">
			<input type="name" class="form-control" id="name" name="name" placeholder="Enter project name">
		</div>
	</div>	
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-5">
			<textarea class="form-control" id="desc" name="desc" placeholder="Enter more details"></textarea>
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
{!! Form::close() !!}

@endsection

