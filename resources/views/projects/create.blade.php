@extends('app')

@section('main')
<h3>Create New Project</h3>
{!! Form::open(['url'=>'project']) !!} 
<div class="form-group">
  <label class="control-label col-sm-2" for="projectname">Project:</label>
  <div class="col-sm-12">
    <input type="name" class="form-control" id="name" name="name" placeholder="Enter project name">
  </div>
</div>

<div class="form-group">
	<div class="col-sm-8">
		 <button type="submit" class="btn btn-default">Save</button>
	</div>
</div>
{!! Form::close() !!}
@endsection

