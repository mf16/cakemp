<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Attachments Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="attachmentsTasks index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('attachment_id') ?></th>
            <th><?= $this->Paginator->sort('task_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($attachmentsTasks as $attachmentsTask): ?>
        <tr>
            <td>
                <?= $attachmentsTask->has('attachment') ? $this->Html->link($attachmentsTask->attachment->name, ['controller' => 'Attachments', 'action' => 'view', $attachmentsTask->attachment->id]) : '' ?>
            </td>
            <td>
                <?= $attachmentsTask->has('task') ? $this->Html->link($attachmentsTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $attachmentsTask->task->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $attachmentsTask->attachment_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachmentsTask->attachment_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachmentsTask->attachment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachmentsTask->attachment_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
