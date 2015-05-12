@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['projectController@destroy', $project->id], 'class'=> 'form-horizontal']) !!} 
			<a href="{{ action('projectController@edit', $project->id) }}" class="btn btn-info btn-md" role="button">Modified</a>
		 	<button type="submit" class="btn btn-danger">Delete</button>
		 	<a href="{{ action('storyController@create', ["projectId" => $project->id]) }}" class="btn btn-info btn-md" role="button">Create New Story</a>
		{!! Form::close() !!}
		<hr>
	</div>
	<div class="col-sm-offset-0 col-sm-12 column">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">Project Id</label>
					<div class="col-sm-10">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $project->id }}" disabled />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Project</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $project->name }}" disabled />
					</div>
				</div>
			</form>
	</div>			
	<div class="col-sm-12 column">				
		<hr>
	</div>
	<div class="col-sm-offset-0 col-sm-12 column">							
		<table class="table">
			<thead>
				<tr>
					<th>
						No
					</th>
					<th>
						Story
					</th>
					<th>
						Last Updated Time
					</th>
				</tr>
			</thead>
			<tbody>
			@foreach($stories as $story)
				<tr>
					<td>
						<a href="{{ url('/story', $story->id) }}">{{ $story->id }}</a>
					</td>
					<td>
						<a href="{{ url('/story', $story->id) }}">{{ $story->name }}</a>
					</td>
					<td>
						{{ $story->updated_at }}
					</td>
				</tr>
			@endforeach			
			</tbody>
		</table>
	</div>


@endsection

