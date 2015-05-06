@extends('app')

@section('main')

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

