<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Task Timeline'), ['action' => 'edit', $taskTimeline->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task Timeline'), ['action' => 'delete', $taskTimeline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskTimeline->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Timeline'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="taskTimeline view large-10 medium-9 columns">
    <h2><?= h($taskTimeline->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Task') ?></h6>
            <p><?= $taskTimeline->has('task') ? $this->Html->link($taskTimeline->task->name, ['controller' => 'Tasks', 'action' => 'view', $taskTimeline->task->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Attachment') ?></h6>
            <p><?= $taskTimeline->has('attachment') ? $this->Html->link($taskTimeline->attachment->name, ['controller' => 'Attachments', 'action' => 'view', $taskTimeline->attachment->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($taskTimeline->id) ?></p>
            <h6 class="subheader"><?= __('Author') ?></h6>
            <p><?= $this->Number->format($taskTimeline->author) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($taskTimeline->created) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Message') ?></h6>
            <?= $this->Text->autoParagraph(h($taskTimeline->message)); ?>

        </div>
    </div>
</div>
