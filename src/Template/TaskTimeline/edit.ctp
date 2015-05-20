<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $taskTimeline->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $taskTimeline->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="taskTimeline form large-10 medium-9 columns">
    <?= $this->Form->create($taskTimeline); ?>
    <fieldset>
        <legend><?= __('Edit Task Timeline') ?></legend>
        <?php
            echo $this->Form->input('author');
            echo $this->Form->input('message');
            echo $this->Form->input('attachment_id', ['options' => $attachments, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
