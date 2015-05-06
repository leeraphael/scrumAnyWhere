@extends('app')

@section('main')

			<form class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">Project Id</label>
					<div class="col-sm-10">
						<input type="id" class="form-control" id="inputEmail3" value="{{ $project->id }}" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Project Name</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $project->name }}" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-default">Save</button>
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
@endsection

