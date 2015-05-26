@extends('app')

@section('main')
<h3>Create New Sprint</h3>
<hr>
{!! Form::open(['url'=>'sprintPlan', 'class'=>'form-horizontal']) !!} 		
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Sprint Plan</label>
		<div class="col-sm-3">
			<input type="name" class="form-control" id="name" name="name">
		</div>			
	</div>			
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Start Date</label>
		<div class="col-sm-2">
		{!! Form::input('date', 'startDate', 0, ['class' => 'form-control']) !!}
		</div>
	</div>				
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">End Date</label>
		<div class="col-sm-2">
		{!! Form::input('date', 'endDate', 0, ['class' => 'form-control']) !!}
		</div>
	</div>		
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Expected Man Day</label>
		<div class="col-sm-5">
		{!! Form::input('text', 'expectedManDay', "", ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Expected Man Day</label>
		<div class="col-sm-5">
		{!! Form::input('text', 'actualManDay', "", ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8 ">
			<a href="{{ URL::previous() }}" class="btn btn-info btn-md" role="button">Back</a>
			<button type="submit" class="btn btn-default">Add</button>
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

