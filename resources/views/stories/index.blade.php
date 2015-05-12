@extends('app')

@section('main')
	<div class="col-sm-offset-0 col-sm-12 column">
		<a href="{{ action('storyController@create') }}" class="btn btn-info btn-md" role="button">Create New Story</a>
		<hr>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>
					No
				</th>
				<th>
					Story Name
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

