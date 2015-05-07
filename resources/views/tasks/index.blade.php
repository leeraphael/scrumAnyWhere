@extends('app')

@section('main')
	<div class="col-sm-offset-0 col-sm-12 column">
		<a href="{{ action('projectController@create') }}" class="btn btn-info btn-md" role="button">Create New Task</a>
		<hr>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>
					No
				</th>
				<th>
					Task Name
				</th>
				<th>
					Last Updated Time
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($tasks as $task)
			<tr>
				<td>
					{{ $task->id }}
				</td>
				<td>
					<a href="{{ url('/tasks', $task->id) }}">{{ $task->name }}</a>
				</td>
				<td>
					{{ $tasks->updated_at }}
				</td>
			</tr>
		@endforeach			
		</tbody>
	</table>
	</div>
@endsection

