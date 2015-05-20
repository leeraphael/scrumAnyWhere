  <div class="portlet" id="task_{{$task->id}}" style="background:#{{ $task->color }}">
    <div class="portlet-header">{{ $task->id }}</div>
    <div class="portlet-content">{{ $task->name }}</div>
    <div class="portlet-owner"><span id="owner_{{$task->id}}" >{{ $task->owner }}</span>
    <div class="portlet-foot"><span id="delete_{{$task->id}}" class="glyphicon glyphicon-minus-sign"></span></div>
    </div>                  
  </div>