@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<style>
	  #taskBox { float: left; width: 40%; min-height: 12em; }
	  .taskBox.custom-state-active { background: #eee; }
	  .taskBox li { float: left; width: 120px; height: 120px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
	  .taskBox li h5 { margin: 0 0 0.4em; cursor: move; }
	  .taskBox li a { float: right; }
	  .taskBox li img { width: 100%; cursor: move; }
	 
	  #doneArea { float: right; width: 60%; min-height: 18em; padding: 1%; }
	  #doneArea h4 { line-height: 16px; margin: 0 0 0.4em; }
	  #doneArea h4 .ui-icon { float: left; }
	  #doneArea .taskBox h5 {  }
  	</style>
<script>
  $(function() {
    // there's the taskBox and the doneArea
    var $taskBox = $( "#taskBox" ),
      $doneArea = $( "#doneArea" );
 
    // let the taskBox items be draggable
    $( "li", $taskBox ).draggable({
      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
      revert: "invalid", // when not dropped, the item will revert back to its initial position
      containment: "document",
      helper: "clone",
      cursor: "move"
    });
 
    // let the doneArea be droppable, accepting the taskBox items
    $doneArea.droppable({
      accept: "#taskBox > li",
      activeClass: "ui-state-highlight",
      drop: function( event, ui ) {
        taskIsDone( ui.draggable );
      }
    });
 
    // let the taskBox be droppable as well, accepting items from the doneArea
    $taskBox.droppable({
      accept: "#doneArea li",
      activeClass: "custom-state-active",
      drop: function( event, ui ) {
        taskIsToDo( ui.draggable );
      }
    });
 
    // image deletion function
    var undo_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
    function taskIsDone( $item ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $doneArea ).length ?
          $( "ul", $doneArea ) :
          $( "<ul class='taskBox ui-helper-reset'/>" ).appendTo( $doneArea );
 
        $item.find( "a.ui-icon-doneArea" ).remove();
        $item.append( undo_icon ).appendTo( $list ).fadeIn(function() {
          $item
            .animate({ width: "120px", height: "120px" })
            .find( "img" )
              .animate({ height: "36px" });
        });
      });
    }
 
    // image recycle function
    function taskIsToDo( $item ) {
      $item.fadeOut(function() {
        $item
          .find( "a.ui-icon-refresh" )
            .remove()
          .end()
          .css( "width", "120px")
          .css( "height", "120px")
          .find( "img" )
          .end()
          .appendTo( $taskBox )
          .fadeIn();
      });
    }
 
    // resolve the icons behavior with event delegation
    $( "ul.taskBox > li" ).click(function( event ) {
      var $item = $( this ),
        $target = $( event.target );
 
      if ( $target.is( "a.ui-icon-doneArea" ) ) {
        taskIsDone( $item );
      } else if ( $target.is( "a.ui-icon-refresh" ) ) {
        taskIsToDo( $item );
      }
 
      return false;
    });
  });
  </script>
@endsection


@section('main')
	<div class="col-sm-12 column">		
		{!! Form::open(['method'=>'DELETE', 'action' => ['projectController@destroy', $project->id], 'class'=> 'form-horizontal']) !!} 
			<a href="{{ URL::previous() }}" class="btn btn-default" role="button">Back</a>
			<a href="{{ action('projectController@edit', $project->id) }}" class="btn btn-info btn-md" role="button">Modified</a>
		 	<button type="submit" class="btn btn-danger">Delete</button>
		 	<a href="{{ action('storyController@create', ["projectId" => $project->id]) }}" class="btn btn-info btn-md" role="button">Create New Story</a>
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
					 <label for="inputPassword3" class="col-sm-2 control-label">Project</label>
					<div class="col-sm-10">
						<input type="name" class="form-control" id="inputEmail3" value="{{ $project->name }}" disabled />
					</div>
				</div>				
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="desc" name="desc" readonly>{{ $project->desc }}</textarea>
					</div>
				</div>	
			</form>
	</div>			
	<div class="col-sm-12 column">				
		<hr>
	</div>
	<div class="col-sm-offset-0 col-sm-12 column">							
		<table class="table">
			<thead>
				<tr>
					<th>
						No
					</th>
					<th>
						Story
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

<div class="ui-widget ui-helper-clearfix">
 
	<ul id="taskBox" class="taskBox ui-helper-reset ui-helper-clearfix">
	  <li class="ui-widget-content ui-corner-tr">
	    <h5 class="ui-widget-header">Task</h5>
	    <div style="height=10px; width=10px;">content</div>   
	    <a href="link/to/doneArea/script/when/we/have/js/off" title="Done" class="ui-icon ui-icon-doneArea">Delete image</a>
	  </li>
	  <li class="ui-widget-content ui-corner-tr">
	    <h5 class="ui-widget-header">Task 2</h5>
	    <div style="height=10px; width=10px;">content</div>
	    <a href="link/to/doneArea/script/when/we/have/js/off" title="Done" class="ui-icon ui-icon-doneArea">Delete image</a>
	  </li>
	  <li class="ui-widget-content ui-corner-tr">
	    <h5 class="ui-widget-header">Task 3</h5>
	    <div style="height=10px; width=10px;">content</div>	    
	    <a href="link/to/doneArea/script/when/we/have/js/off" title="Done" class="ui-icon ui-icon-doneArea">Delete image</a>
	  </li>
	  <li class="ui-widget-content ui-corner-tr">
	    <h5 class="ui-widget-header">Task 4</h5>
	    <div style="height=10px; width=10px;">content</div>
	    <a href="link/to/doneArea/script/when/we/have/js/off" title="Done" class="ui-icon ui-icon-doneArea">Delete image</a>
	  </li>
	  <li class="ui-widget-content ui-corner-tr">
	    <h5 class="ui-widget-header">Task 5</h5>
	    <div style="height=10px; width=10px;">content</div>
	    <a href="link/to/doneArea/script/when/we/have/js/off" title="Done" class="ui-icon ui-icon-doneArea">Delete image</a>
	  </li>
	</ul>
	<div id="doneArea" class="ui-widget-content ui-state-default">
	  <h4 class="ui-widget-header"><span class="ui-icon ui-icon-doneArea">Done</span> Done</h4>
	</div>
</div>
@endsection

