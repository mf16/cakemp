<h1>Dashboard</h1>
<?php
echo $this->Html->link(
	$this->Html->button(__('+ add project'),[
		'class' => 'pull-right'
		,'type' => 'primary'
	])
	,[
		'controller'=>'Projects'
		,'action' => 'add'
	],
	[
		'escape' => false
	]
);
foreach($myProjects as $myProject){
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12 projectTitle mg-t-lg">
				<div class="col-md-8">
					<h2 class="white" style="margin:0;line-height:60px;">
						<?php echo $myProject->name; ?>
					</h2>
				</div>
				<div class="taskHeaders text-right col-md-2">
					<span>Status</span>
				</div>
				<div class="taskHeaders col-md-2">
					<span>Credits</span>
				</div>
			</div>
		</div>
	</div>
	<?php
	// color array -> what do these mean again?
	$colorArray=[
		'1' => 'green'
		,'2' => 'yellow'
		,'3' => 'red'
		,'4' => 'yellow'
		,'5' => 'yellow'
		,'6' => 'green'
		,'7' => 'red'
		,'8' => 'green'
	];
	foreach($myTasks[$myProject->id] as $myTask){
		?>
		<a href="/timeline/<?php echo $myTask->id;?>">
			<div class="col-md-12 taskContainer <?php echo $colorArray[$myTask->status_id];?>" <?php ?> data-taskid="<?php ?>">
				<div class="col-md-8">
					<span class="taskTitle"><?php echo $myTask->name; ?></span>
				</div>
				<div class="col-md-2 text-right">
					<button class="btn btn-primary taskStatus <?php echo $colorArray[$myTask->status_id];?>">
					<?php echo __(ucwords($task_statuses[($myTask->status_id-1)]['status'])); ?></button>
				</div>
				<div class="col-md-2 text-right">
					<?php
						//if($task['status']>3){
							echo '<span class="taskCreditCost">'.'</span>';
						//}
					?>
				</div>
			</div>
		</a>
		<?php
	}
	echo $this->Html->link(
		$this->Html->button(__('+ add new task'),[
			'class' => 'newTask'
		])
		,[
			'controller'=>'Tasks'
			,'action' => 'add'
			,$myProject->id
		],
		[
			'escape' => false
		]
	);
}
?>
