@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<style>
	  #taskBox { float: left; width: 10%; min-height: 12em; }
	  .taskBox.custom-state-active { background: #eee; }
	  .taskBox li { float: left; width: 120px; height: 120px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
	  .taskBox li h5 { margin: 0 0 0.4em; cursor: move; }
	  .taskBox li a { float: right; }
	 
	  #toDoArea { float: left; width: 33%; min-height: 18em; padding: 1%; }
	  #toDoArea h4 { line-height: 16px; margin: 0 0 0.4em; }
	  #toDoArea h4 .ui-icon { float: left; }

	  #inProgressArea { float: left; width: 33%; min-height: 18em; padding: 1%; }
	  #inProgressArea h4 { line-height: 16px; margin: 0 0 0.4em; }
	  #inProgressArea h4 .ui-icon { float: left; }

	  #doneArea { float: left; width: 33%; min-height: 18em; padding: 1%; }
	  #doneArea h4 { line-height: 16px; margin: 0 0 0.4em; }
	  #doneArea h4 .ui-icon { float: left; }
  	</style>
<script>
  $(function() {
    // there's the taskBox and the doneArea
    var $taskBox = $( "#taskBox" ),
      $doneArea = $( "#doneArea" ),
      $toDoArea = $( "#toDoArea" ),
      $inProgressArea = $( "#inProgressArea" );
 
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
        taskIsDrop( ui.draggable, $doneArea );
      }
    });

    $inProgressArea.droppable({
      accept: "#taskBox > li",
      activeClass: "ui-state-highlight",
      drop: function( event, ui ) {
        taskIsDrop( ui.draggable, $inProgressArea );
      }
    });

    $toDoArea.droppable({
      accept: "#taskBox > li",
      activeClass: "ui-state-highlight",
      drop: function( event, ui ) {
        taskIsDrop( ui.draggable, $toDoArea );
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
    function taskIsDrop( $item, $targetArea ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $targetArea ).length ?
          $( "ul", $targetArea ) :
          $( "<ul id='taskBox' class='taskBox ui-helper-reset'/>" ).appendTo( $targetArea );
 
        $item.appendTo( $list ).fadeIn(function() {
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
        taskIsDrop( $item );
      } else if ( $target.is( "a.ui-icon-refresh" ) ) {
        taskIsToDo( $item );
      }
 
      return false;
    });
  });
  </script>
@endsection

@section('main')
<div class="jumbotron">
	<h1>
		歡迎使用ScrumAnyWhere
	</h1>
	<p>
		This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
	</p>
	<p>
		<a class="btn btn-primary btn-large" href="#">Learn more</a>
	</p>
</div>
@endsection

