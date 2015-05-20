<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="attachments index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('uri') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($attachments as $attachment): ?>
        <tr>
            <td><?= $this->Number->format($attachment->id) ?></td>
            <td><?= h($attachment->uri) ?></td>
            <td><?= h($attachment->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $attachment->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachment->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?>
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
