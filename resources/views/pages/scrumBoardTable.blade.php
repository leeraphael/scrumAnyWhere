<div class="portlet" id="task_{{$taskId}}" style="background:#{{ $taskColor }}">
  <div class="portlet-header">{{ $taskId }}</div>
  <div class="portlet-content">{{ $taskName }}</div>
  <div class="portlet-owner"><span id="owner_{{$taskId}}" >{{ $taskOwner }}</span>
  <div class="portlet-foot"><span id="delete_{{$taskId}}" class="glyphicon glyphicon-minus-sign"></span></div>
  </div>                  
</div>