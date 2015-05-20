<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects Permissions'), ['controller' => 'ProjectsPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects Permission'), ['controller' => 'ProjectsPermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Metas'), ['controller' => 'UserMetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Meta'), ['controller' => 'UserMetas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('account');
            echo $this->Form->input('role');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('manager');
            echo $this->Form->input('skillsets._ids', ['options' => $skillsets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
