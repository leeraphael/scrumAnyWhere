@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
@media (min-width: 979px) {
  ul.nav li.dropdown:hover > ul.dropdown-menu {
    display: block;
  }
}
  .box {
    cursor: move;
  } 
  .taskArea{
    background-color: #FCFCEE;
  }
  .taskBox {
    min-width:170px;
    float: left;    
    margin-top: 5px;
    margin-left: 10px;
    padding-bottom: 60px;
  }
  .portlet {
    margin: 0 1em 1em 0;    
    height: 100px;
    width: 150px;
    border-radius: 10px;
    float: left;
    border: 0px;
  }
  .portlet-header {
    font-size:small;
    text-align: left;
    width: 150px;
    height: 20px;
    padding: 0.0px 4.1px;
    margin-bottom: 0.5em;
    border-radius: 10px 10px 0px 0px;
    border: 0px;
    background-color: #0300DC;

    /* for transparency*/
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";       /* IE 8 */
    filter: alpha(opacity=50);  /* IE 5-7 */
    -moz-opacity: 0.5;          /* Netscape */
    -khtml-opacity: 0.5;        /* Safari 1.x */
    opacity: 0.5;               /* Good browsers */
  }
  .portlet-owner {
    font-size:small;
    text-align: center;
    padding-left:35px;
  }    
  .portlet-foot {
    font-size:small;
    text-align: right;
    margin-right: 5px;
    margin-top: 14px;
    float: right;  
  }
  .portlet-toggle {
    top: 50%;
    right: 0;
    margin-top: -8px;
  }
  .portlet-content {
    text-align: center;
    padding: 0px;
    height: 38px;
  }
  .portlet-placeholder {
    border: 2px dotted yellow;
    margin: 0 1em 1em 0;
    height: 100px;
    width: 150px;
  }
  .storyArea{
    background-color: #FFFFFF;
    min-width: 150px;
    text-align: center;
  }
.storyBox {
  height: 150px;
  min-width: 150px;
  float: left;
  margin-top: 5px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: inset 0 0 3px #000;
  text-align: center;
}
.storyBox header {
  color: #fff;
  text-shadow: #000 0 1px;
  box-shadow: 5px;
  margin-bottom: 15px;
  padding: 5px;
  border-bottom: 1px solid #aaa;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.storyBox-name {
    font-size: large;
    text-align: center;
    margin-bottom: 1px;
  }
.storyBox-duration {
    font-size:small;
    text-align: center;
  }
.storyBox-foot {
  font-size:small;
  text-align: right;
  margin-right: 10px;
}
  </style>
  <script>
  $(function() {
    $( ".taskBox" ).sortable({
      connectWith: ".taskBox", 
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all",
      update : function (event, ui) {
        if(this === ui.item.parent()[0])
        { 
          // update task owner
          $('#owner_'+ui.item.context.id.split("_")[1]).text("{{ session('username')}}");
          console.log($('#owner_'+ui.item.context.id.split("_")[1]));
          //post to server to update DB
          $.post( 'updateTask', { taskId: ui.item.context.id.split("_")[1],
                                  status: ui.item.parent()[0].id,
                                  owner:  "{{ session('username')}}",
                                  _token: "{{ csrf_token() }}" });    

        }
      }
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

    $('[id^=delete_]').click(function() {
      var taskId = $(this)[0].id.split("_")[1];
      // update task owner
      $('#task_'+taskId).remove();
      // //post to server to update DB
      $.post( 'deleteTask', { taskId: taskId,
                              _token: "{{ csrf_token() }}" }); 
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
              <a href="{{ action('storyController@create',  ["projectId" => session('projectId')]) }}" role="button">
                <span class="glyphicon glyphicon-plus-sign"></span>
              </a>
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
            <td class="storyArea" width="170px">
                <div class="storyBox"><header><a href="{{ url('/story', $data['story']->id) }}">{{ $data['story']->id }}</a></header>
                  <div class="storyBox-name">{{ strlen($data['story']->name)>15?substr($data['story']->name, 0, 15):$data['story']->name }}</div>   
                  <div class="storyBox-duration">{{$data['story']->manDay}}d</div>     
                  <div class="storyBox-duration">{{$data['story']->startDate}}</div>                    
                  <div class="storyBox-duration">~{{$data['story']->doneDate}}</div>
                  <div class="storyBox-foot">
                    <a href="{{ action('storyController@show',  ["storyId" => $data['story']->id]) }}" role="button">
                      <span class="configIconColor glyphicon glyphicon-cog"></span>
                    </a>
                    <a href="{{ action('taskController@create',  ["storyId" => $data['story']->id]) }}" role="button">
                      <span class="configIconColor glyphicon glyphicon-plus-sign"></span>
                    </a>
                  </div>
                </div>
            </td>
            <td class="taskArea">
              <div class="taskBox" id="todo">
                @foreach($data['tasksTodo'] as $task)
                  @include('pages.scrumBoardTable')
                @endforeach   
              </div>
            </td>
            <td class="taskArea">
              <div class="taskBox" id="go">
                @foreach($data['tasksGo'] as $task)
                  @include('pages.scrumBoardTable')
                @endforeach   
              </div>
            </td>
            <td class="taskArea">
              <div class="taskBox" id="done">
                @foreach($data['tasksDone'] as $task)
                  @include('pages.scrumBoardTable')
                @endforeach   
              </div>
            </td>
          </tr>
        @endforeach   
        </tbody>
      </table>
@endsection



@section('sidebar')
<script>
function explode(){
  $.post( 'updateLog', { _token: "{{ csrf_token() }}" })
    .done(function(data){ 
      if(data!="")
      {
        $('#log1').prepend('<li>'+data+'</li>');
        if($( "#log1 li" ).size()>10)
        {
          $("#log1 li:last").remove();
        }
      }      
    });    
  ;
  setTimeout(explode, 6000);
}
setTimeout(explode, 3000);
</script>
<div>
  <h4>Activity Board</h4>
  <hr>
  <ul id="log1"> 
  </ul>
</div>
@endsection