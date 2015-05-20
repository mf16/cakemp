<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $skillset->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $skillset->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Skillsets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsets form large-10 medium-9 columns">
    <?= $this->Form->create($skillset); ?>
    <fieldset>
        <legend><?= __('Edit Skillset') ?></legend>
        <?php
            echo $this->Form->input('skill');
            echo $this->Form->input('tasks._ids', ['options' => $tasks]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
