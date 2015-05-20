<div class="projects form col-md-6 col-md-offset-3">
    <?= $this->Form->create($project); ?>
		<h1>Add New Project</h1>
        <?php
            echo $this->Form->input('name',
			[
				'placeholder'=>'Project Name'
				,'label'=>false
				,'class'=>'form-control mg-t-md large'
			]);
            //echo $this->Form->input('account_id', ['options' => $accounts]);
            echo $this->Form->input('github_url',
			[
				'placeholder'=>'Github link'
				,'label'=>false
				,'class'=>'form-control mg-t-md large'
			]);
            echo $this->Form->input('details',
			[
				'placeholder'=>'Project Description'
				,'label'=>false
				,'class'=>'form-control mg-t-md large'
			]);
        ?>
    <?= $this->Form->button(__('Create Project'),
	[
		'class'=>'btn btn-primary mg-t-md pull-left'
		,'style'=>'font-size:18px;'
	]) ?>
    <?= $this->Form->end() ?>
</div>
