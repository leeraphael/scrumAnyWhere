@extends('app')

@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['projectController@destroy', $project->id], 'class'=> 'form-horizontal']) !!} 
		<a href="{{ action('projectController@edit', $project->id) }}" class="btn btn-info btn-md" role="button">Modified</a>
		 <button type="submit" class="btn btn-danger">Delete</button>
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
					 <label for="inputPassword3" class="col-sm-2 control-label">Project Name</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $project->name }}" disabled />
					</div>
				</div>
			</form>
			<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>

	</div>


@endsection

