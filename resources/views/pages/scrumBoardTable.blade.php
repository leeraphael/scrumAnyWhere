  <div class="portlet" id="task_{{$task->id}}" style="background:#{{ $task->color }}">
    <div class="portlet-header box">{{ $task->id }}</div>
    <div class="portlet-content" id="taskName_{{$task->name}}">{{ $task->name }}</div>
    <div class="portlet-owner"><span id="owner_{{$task->id}}" >{{ $task->owner }}</span>
    <div class="portlet-foot">
	    <a href="{{ action('taskController@show',  ["taskId" => $task->id]) }}" role="button">
	      <span class="configIconColor glyphicon glyphicon-cog"></span>
	    </a>
	    <span id="delete_{{$task->id}}" class="configIconColor glyphicon glyphicon-minus-sign"></span>
    </div>
    </div>                  
  </div>