@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
  body {
    min-width: 520px;
  }
  .storyBoxContainer {
    width: 90px;
    float: left;    
    padding-bottom: 100px;
  }
  .taskBox {
    width: 130px;
    float: left;    
    margin-top: 5px;
    margin-left: 10px;
    padding-bottom: 50px;
  }
  .portlet {
    margin: 0 1em 1em 0;
    font: 10;
    height: 130px;
    width: 130px;
    padding: 0.3em;
  }
  .portlet-header {
    padding: 0.0px 4.1px;
    margin-bottom: 0.5em;
  }
  .portlet-toggle {
    top: 50%;
    right: 0;
    margin-top: -8px;
  }
  .portlet-content {
    padding: 0.4em;
  }
  .portlet-placeholder {
    border: 2px dotted yellow;
    margin: 0 1em 1em 0;
    height: 130px;
    width: 130px;
  }

  .storyBox {
  height: 150px;
  width: 150px;
  float: left;
  margin-top: 5px;
  background-color: #fff;
  -webkit-border-radius: 10px;
  -ms-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 3px #000;
  -ms-box-shadow: inset 0 0 3px #000;
  box-shadow: inset 0 0 3px #000;
  text-align: center;
  cursor: move;
}
.storyBox header {
  color: #fff;
  text-shadow: #000 0 1px;
  box-shadow: 5px;
  margin-bottom: 20px;
  padding: 5px;
  border-bottom: 1px solid #aaa;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  -ms-border-radius-topleft: 10px;
  border-top-left-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -ms-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
  border-top-right-radius: 10px;
}
  </style>
  <script>
  $(function() {
    $( ".taskBox" ).sortable({
      connectWith: ".taskBox", 
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
    });
 
    $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span></span>");
 
    $( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });
  });
  </script>
@endsection

@section('main')

<table class="table table-bordered">
        <thead>
          <tr>
            <th class="active">
              Story
            </th>
            <th class="active">
              Todo
            </th>
            <th class="active">
              In Progress
            </th>
            <th class="active">
              Done
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($dataSet as $data)
          <tr>
            <td>
              <div class="storyBoxContainer">
                
                <div class="storyBox" draggable="true"><header><a href="{{ url('/story', $data['story']->id) }}">{{ $data['story']->id }}</a></header>
                  {{ $data['story']->name }}
                </div>
              </div> 
            </td>
            <td>
              <div class="taskBox">
              @foreach($data['tasksTodo'] as $task)
                <div class="portlet">
                  <div class="portlet-header">{{ $task->id }}</div>
                  <div class="portlet-content">{{ $task->name }}</div>
                </div>
              @endforeach   
              </div>
            </td>
            <td>
              <div class="taskBox">
                @foreach($data['tasksGo'] as $task)
                <div class="portlet">
                  <div class="portlet-header">{{ $task->id }}</div>
                  <div class="portlet-content">{{ $task->name }}</div>
                </div>
              @endforeach   
              </div>
            </td>
            <td>
              <div class="taskBox">
                @foreach($data['tasksDone'] as $task)
                <div class="portlet">
                  <div class="portlet-header">{{ $task->id }}</div>
                  <div class="portlet-content">{{ $task->name }}</div>
                </div>
              @endforeach   
              </div>
            </td>
          </tr>
        @endforeach   
        </tbody>
      </table>
@endsection