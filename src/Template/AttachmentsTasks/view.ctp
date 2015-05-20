<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Attachments Task'), ['action' => 'edit', $attachmentsTask->attachment_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachments Task'), ['action' => 'delete', $attachmentsTask->attachment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachmentsTask->attachment_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachments Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="attachmentsTasks view large-10 medium-9 columns">
    <h2><?= h($attachmentsTask->attachment_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Attachment') ?></h6>
            <p><?= $attachmentsTask->has('attachment') ? $this->Html->link($attachmentsTask->attachment->name, ['controller' => 'Attachments', 'action' => 'view', $attachmentsTask->attachment->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Task') ?></h6>
            <p><?= $attachmentsTask->has('task') ? $this->Html->link($attachmentsTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $attachmentsTask->task->id]) : '' ?></p>
        </div>
    </div>
</div>
