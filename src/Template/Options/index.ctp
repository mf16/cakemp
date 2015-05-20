<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="options index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('value') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($options as $option): ?>
        <tr>
            <td><?= $this->Number->format($option->id) ?></td>
            <td><?= h($option->name) ?></td>
            <td><?= h($option->value) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $option->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $option->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?>
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
