@extends('app')

@section('main')
<h3>Create New Project</h3>
<hr>
{!! Form::open(['url'=>'project']) !!} 
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Project Name</label>
		<div class="col-sm-10">
			<input type="name" class="form-control" id="name" name="name" placeholder="Enter project name">
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-8 ">
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

