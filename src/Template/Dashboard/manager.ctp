<?php 
//debug($myDevelopers); 
$selectDevs=array();
foreach($myDevelopers as $myDev){
	$selectDevs[$myDev->id]=$myDev->first_name.' '.$myDev->last_name;
}
?>
<h1>Available Tasks</h1>
<?php
foreach($availableTasks as $availableTask){
	echo '<div>';
		echo $availableTask->id;
		echo $availableTask->name;
		echo $availableTask->description;
		echo $availableTask->project;
	echo '</div>';
	echo $this->Form->create($availableTask);
	echo $this->Form->hidden('id',[
		'value'=>$availableTask->id
	]);
	echo $this->Form->hidden('status_id',[
		// assigned status
		'value'=>2
	]);
	echo $this->Form->select('assignee',
		$selectDevs
	);
	echo $this->Form->button('Save');
	echo $this->Form->end();
	//debug($availableTask);
	echo '<br/>';
}
?>

<h1>Awaiting bid Acceptance from Client</h1>
<?php
foreach($awaitingAccTasks as $task){
	echo $task->id;
	echo $task->name;
	echo $task->description;
	echo $task->project;
	//debug($task);
	echo 'bid: Lead time of '.end($task->bids)->wait_time.' days and work time of '.end($task->bids)->work_time.' hours.';
	//debug($awaitingTask);
	echo '<br/>';
}
?>
<h1>Awaiting bid from Developer</h1>
<?php
foreach($awaitingTasks as $awaitingTask){
	echo $awaitingTask->id;
	echo $awaitingTask->name;
	echo $awaitingTask->description;
	echo $awaitingTask->project;
		echo 'assigned to: '.$selectDevs[$awaitingTask->assignee];
	//debug($awaitingTask);
	echo '<br/>';
}
?>
<h1>Rejected Bids</h1>
<?php
foreach($rejectedTasks as $rejectedTask){
	echo '<div>';
		echo $rejectedTask->id;
		echo $rejectedTask->name;
		echo $rejectedTask->description;
		echo $rejectedTask->project;
		echo 'last dev: '.$selectDevs[$rejectedTask->assignee];
	echo '<br/>';
	echo 'last bid: Lead time of '.end($rejectedTask->bids)->wait_time.' days and work time of '.end($rejectedTask->bids)->work_time.' hours.';
	echo '</div>';
	echo $this->Form->create($rejectedTask);
	echo $this->Form->hidden('id',[
		'value'=>$rejectedTask->id
	]);
	echo $this->Form->hidden('status_id',[
		// assigned status
		'value'=>2
	]);
	echo $this->Form->select('assignee',
		$selectDevs
	);
	echo $this->Form->button('Save');
	echo $this->Form->end();
	echo '<br/>';
}
?>
<h1>In Progress</h1>
<?php
foreach($inProgressTasks as $inProgressTask){
	echo $inProgressTask->id;
	echo $inProgressTask->name;
	echo $inProgressTask->description;
	echo $inProgressTask->project;
		echo 'assigned to: '.$selectDevs[$inProgressTask->assignee];
	//debug($awaitingTask);
	echo '<br/>';
}
?>

<h1>Awaiting Confirmation of Completion from Client</h1>
<?php
foreach($awaitingConfTasks as $task){
	echo $task->id;
	echo $task->name;
	echo $task->description;
	echo $task->project;
	//debug($task);
	//echo 'bid: Lead time of '.end($task->bids)->wait_time.' days and work time of '.end($task->bids)->work_time.' hours.';
	//debug($awaitingTask);
	echo '<br/>';
}
?>
