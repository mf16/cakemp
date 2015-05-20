<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __(ucwords($role).' Registration') ?></legend>
        <?php
		// echo links to other registrations
		$roleTypes=array('client','developer','manager');
		$linkRoleTypes=array_diff($roleTypes,array($role));
		foreach($linkRoleTypes as $linkRoleType){
			echo $this->Html->link(
				__(ucwords($linkRoleType).' Registration')
				,'/register/'.$linkRoleType
				
			);
			echo '<br/>';
		}
		echo '<br/>';
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		if($role=='developer'){
			echo $this->Form->input('managerEmail',array('type'=>'email'));
			echo $this->Form->input('skillsets._ids', [
				'options' => $skillsets
				,'type' => 'select'
				,'multiple' => 'checkbox'
				]);
		}
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
