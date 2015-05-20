<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Task Status'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="taskStatuses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($taskStatuses as $taskStatus): ?>
        <tr>
            <td><?= $this->Number->format($taskStatus->id) ?></td>
            <td><?= h($taskStatus->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $taskStatus->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskStatus->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taskStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatus->id)]) ?>
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
