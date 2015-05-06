@extends('app')

@section('main')
	<div class="col-sm-offset-0 col-sm-8 column">
		<a href="{{ action('projectController@create') }}" class="btn btn-info btn-md" role="button">Create New Project</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>
					No
				</th>
				<th>
					Project Name
				</th>
				<th>
					Last Updated Time
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($projects as $project)
			<tr>
				<td>
					{{ $project->id }}
				</td>
				<td>
					<a href="{{ url('/project', $project->id) }}">{{ $project->name }}</a>
				</td>
				<td>
					{{ $project->updated_at }}
				</td>
			</tr>
		@endforeach
			
		</tbody>
	</table>
@endsection

