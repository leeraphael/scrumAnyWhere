@extends('app')

@section('head')
<script>
  $(function() {
    $('#createReleasePlanId').click(function() {
      window.location.href = "{{ action('releasePlanController@create')}}";
    });
    $('#releasePlanId').change(function() {   
      $.post( 'updateReleasePlanList', {  releasePlanId: $('#releasePlanId').val(),                                          
                                          _token: "{{ csrf_token() }}" })
      .done(function(data){ 
      if(data!="")
      {
        alert(data);
      }
      else
      {
        alert("no data");
      }
    });
    });
    $('#createSprintPlanId').click(function() {
      window.location.href = "{{ action('sprintPlanController@create')}}";      
    });
  });
</script>
@endsection

@section('main')
{!! Form::open(['url'=>'releasePlan', 'class'=>'form-horizontal']) !!}
  <div class="form-group">
    <label for="name" class="col-sm-1 control-label">Release Plan</label>
    <div class="col-sm-2">
    <select name="releasePlanId" id="releasePlanId" class="form-control">
      @foreach($releasePlans as $releasePlan)
      <option value="{{ $releasePlan->id }}">{{ $releasePlan->name}}</option>
      @endforeach         
    </select>
    </div>
      <span id="createReleasePlanId" class="control-label configIconColor glyphicon glyphicon-plus-sign"></span>
  </div>  
  <div class="form-group">
     <label for="name" class="col-sm-1 control-label">Sprint Plan</label>
    <div class="col-sm-2">
      {!! Form::selectRange('manDay', 1, 10, 2, ['class' => 'form-control']) !!}      
    </div>
      <span id="createSprintPlanId" class="control-label configIconColor glyphicon glyphicon-plus-sign"></span>    
  </div>
{!! Form::close() !!}
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="active">
        Release Plan: 
        </a>
      </th>
  </thead>
  <tbody>        
    <tr>
      <td class="storyArea" width="170px">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="success">
                Sprint Plan: 
                <a href="{{ action('storyController@create',  ["projectId" => session('projectId'), 
                                                               "location"  => "backlog"]
                                                               ) }}" role="button">                        
                </a>
              </th>
          </thead>
          <tbody>        
            <tr>
              <td class="storyArea" width="170px">
             
              </td>        
          </tbody>
        </table>  
      </td>        
  </tbody>
</table>
@endsection

@section('sidebar')

@endsection