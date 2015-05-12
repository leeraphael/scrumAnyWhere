@extends('app')

@section('main')
	<div class="col-sm-offset-0 col-sm-12 column">
		<a href="{{ action('taskController@create') }}" class="btn btn-info btn-md" role="button">Create New Task</a>
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
					<a href="{{ url('/task', $task->id) }}">{{ $task->id }}</a>
				</td>
				<td>
					<a href="{{ url('/task', $task->id) }}">{{ $task->name }}</a>
				</td>
				<td>
					{{ $task->updated_at }}
				</td>
			</tr>
		@endforeach			
		</tbody>
	</table>
	</div>
@endsection

