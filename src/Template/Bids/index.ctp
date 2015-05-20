<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Bid'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bids index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('tasks_id') ?></th>
            <th><?= $this->Paginator->sort('bidder_id') ?></th>
            <th><?= $this->Paginator->sort('work_time') ?></th>
            <th><?= $this->Paginator->sort('wait_time') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($bids as $bid): ?>
        <tr>
            <td><?= $this->Number->format($bid->id) ?></td>
            <td>
                <?= $bid->has('task') ? $this->Html->link($bid->task->name, ['controller' => 'Tasks', 'action' => 'view', $bid->task->id]) : '' ?>
            </td>
            <td><?= h($bid->bidder_id) ?></td>
            <td><?= $this->Number->format($bid->work_time) ?></td>
            <td><?= $this->Number->format($bid->wait_time) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $bid->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bid->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bid->id)]) ?>
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
