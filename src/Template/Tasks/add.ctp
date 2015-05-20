<div class="tasks form col-md-6 col-md-offset-3">
    <?= $this->Form->create($task); ?>
		<h1>Add new task</h1>
        <?php
            //echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('name',
			[
				'placeholder'=>'Task Name'
				,'label'=>false
				,'class'=>'form-control mg-t-md large'
			]);
            echo $this->Form->input('description',
			[
				'placeholder'=>'Description of task'
				,'class'=>'form-control mg-t-md large'
				,'label'=>false
			]);
            //echo $this->Form->input('status_id', ['options' => $taskStatuses]);
            //echo $this->Form->input('assignee');
            //echo $this->Form->input('last_assignee');
            //echo $this->Form->input('attachments._ids', ['options' => $attachments]);
			echo '<p>You may add attachments in the task timeline after creating the task.</p>';
            echo $this->Form->input('skillsets._ids', [
				'options' => $skillsets
				,'type' => 'select'
				,'multiple' => 'checkbox'
			]);
        ?>
    <?= $this->Form->button('Create Task',
	[
		'class'=>'btn btn-primary mg-t-md pull-left'
		,'style'=>'font-size:18px;'
	]) ?>
    <?= $this->Form->end() ?>
</div>
