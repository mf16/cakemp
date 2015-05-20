<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Permission Status'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="permissionStatuses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($permissionStatuses as $permissionStatus): ?>
        <tr>
            <td><?= $this->Number->format($permissionStatus->id) ?></td>
            <td><?= h($permissionStatus->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $permissionStatus->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissionStatus->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissionStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionStatus->id)]) ?>
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
