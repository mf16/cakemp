<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $skillsetsTask->task_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $skillsetsTask->task_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Skillsets Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsetsTasks form large-10 medium-9 columns">
    <?= $this->Form->create($skillsetsTask); ?>
    <fieldset>
        <legend><?= __('Edit Skillsets Task') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
