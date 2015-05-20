<h1>Awaiting Bid</h1>
<?php
foreach($awaitingBidTasks as $task){
	echo '<a href="/timeline/'.$task->id.'">';
		echo $task->name;
	echo '</a>';
	//debug($task);
}
?>
<h1>Awaiting Client Acceptance</h1>
<?php
foreach($awaitingAcceptanceTasks as $task){
	echo '<a href="/timeline/'.$task->id.'">';
		echo $task->name;
	echo '</a>';
	//debug($task);
}
?>
<h1>In Progress</h1>
<?php
foreach($inProgressTasks as $task){
	echo '<a href="/timeline/'.$task->id.'">';
		echo $task->name;
	echo '</a>';
	//debug($task);
}
?>
