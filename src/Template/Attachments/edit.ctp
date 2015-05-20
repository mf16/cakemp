<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attachment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="attachments form large-10 medium-9 columns">
    <?= $this->Form->create($attachment); ?>
    <fieldset>
        <legend><?= __('Edit Attachment') ?></legend>
        <?php
            echo $this->Form->input('uri');
            echo $this->Form->input('name');
            echo $this->Form->input('tasks._ids', ['options' => $tasks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
