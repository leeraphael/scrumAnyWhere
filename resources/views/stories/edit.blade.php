@extends('app')

@section('main')	
<h3>Edit Story</h3>
<hr>
	{!! Form::open(['method'=>'PUT', 'action' => ['storyController@update', $story->id], 'class'=> 'form-horizontal']) !!} 
	<div class="form-group">
		 <label for="projectId" class="col-sm-2 control-label">Story Id</label>
		<div class="col-sm-3">
			<input type="id" class="form-control" id="projectId" value="{{ $story->id }}" disabled />
		</div>
	</div>
	<div class="form-group">
		 {!! Form::label('name', 'Story Name', ['class'=>'col-sm-2 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::text('name', $story->name, ['class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Start Date</label>
		<div class="col-sm-2">
		{!! Form::input('date', 'startDate',  $story->startDate, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Man Day</label>
		<div class="col-sm-2">
			{!!	Form::selectRange('manDay', 1, 10, $story->manDay, ['class' => 'form-control']) !!}
		</div>
	</div>	
	<div class="form-group">
		 <label for="name" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-5">
		<textarea class="form-control" id="desc" name="desc">{{$story->desc}}</textarea>
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

