<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Task Timeline'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="taskTimeline index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('task_id') ?></th>
            <th><?= $this->Paginator->sort('author') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('attachment_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($taskTimeline as $taskTimeline): ?>
        <tr>
            <td><?= $this->Number->format($taskTimeline->id) ?></td>
            <td>
                <?= $taskTimeline->has('task') ? $this->Html->link($taskTimeline->task->name, ['controller' => 'Tasks', 'action' => 'view', $taskTimeline->task->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($taskTimeline->author) ?></td>
            <td><?= h($taskTimeline->created) ?></td>
            <td>
                <?= $taskTimeline->has('attachment') ? $this->Html->link($taskTimeline->attachment->name, ['controller' => 'Attachments', 'action' => 'view', $taskTimeline->attachment->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $taskTimeline->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskTimeline->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taskTimeline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskTimeline->id)]) ?>
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
