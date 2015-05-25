@extends('app')

@section('head')
@endsection

@section('main')
<table class="table table-bordered">
        <thead>
          <tr>
            <th class="active">
              Story
              <a href="{{ action('storyController@create',  ["projectId" => session('projectId'), 
                                                             "location"  => "backlog"]
                                                             ) }}" role="button">
                <span class="glyphicon glyphicon-plus-sign"></span>
              </a>
            </th>
        </thead>
        <tbody>        
          <tr>
            <td class="storyArea" width="170px">
            @foreach($stories as $story)
                <div class="storyBox"><header><a href="{{ url('/story', $story->id) }}">{{ $story->id }}</a></header>
                  <div class="storyBox-name">{{ strlen($story->name)>15?substr($story->name, 0, 15):$story->name }}</div>   
                  <div class="storyBox-duration">{{$story->manDay}}d</div>     
                  <div class="storyBox-duration">{{$story->startDate}}</div>                    
                  <div class="storyBox-duration">~{{$story->endDate}}</div>
                  <div class="storyBox-foot">
                    <a href="{{ action('storyController@show',  ["storyId" => $story->id]) }}" role="button">
                      <span class="configIconColor glyphicon glyphicon-cog"></span>
                    </a>
                    <a href="{{ action('taskController@create',  ["storyId" => $story->id]) }}" role="button">
                      <span class="configIconColor glyphicon glyphicon-plus-sign"></span>
                    </a>
                  </div>
                </div>
            @endforeach   
            </td>        
        </tbody>
      </table>
@endsection

@section('sidebar')
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="active">
        ICE Box
      </th>
  </thead>
  <tbody>        
    <tr>
      <td class="storyArea" width="170px" height="187px">
      <div class="iceBox"></div>
      </td>        
  </tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="active">
        Sand Box
      </th>
  </thead>
  <tbody>        
    <tr>
      <td class="storyArea" width="170px" height="187px">
      <div class="iceBox"></div>
      </td>        
  </tbody>
</table>
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="active">
        Trash
      </th>
  </thead>
  <tbody>        
    <tr>
      <td class="storyArea" width="170px" height="187px">
      <div class="iceBox"></div>
      </td>        
  </tbody>
</table>
@endsection