@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
  body {
    min-width: 520px;
  }
  .storyBox {
    width: 90px;
    float: left;    
    padding-bottom: 100px;
  }
  .taskBox {
    width: 130px;
    float: left;    
    padding-bottom: 50px;
  }
  .portlet {
    margin: 0 1em 1em 0;
    height: 130px;
    width: 130px;
    padding: 0.3em;
  }
  .portlet-header {
    padding: 0.2em 0.3em;
    margin-bottom: 0.5em;
    position: relative;
  }
  .portlet-toggle {
    position: absolute;
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
        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
 
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
              In Projress
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
              <div class="storyBox">
                <a href="{{ url('/story', $data['story']->id) }}">{{ $data['story']->name }}</a>
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