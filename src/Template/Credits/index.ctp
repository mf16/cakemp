<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Credit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="credits index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('purchase_id') ?></th>
            <th><?= $this->Paginator->sort('account_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($credits as $credit): ?>
        <tr>
            <td><?= $this->Number->format($credit->id) ?></td>
            <td><?= $this->Number->format($credit->status) ?></td>
            <td>
                <?= $credit->has('purchase') ? $this->Html->link($credit->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $credit->purchase->id]) : '' ?>
            </td>
            <td>
                <?= $credit->has('account') ? $this->Html->link($credit->account->name, ['controller' => 'Accounts', 'action' => 'view', $credit->account->id]) : '' ?>
            </td>
            <td><?= h($credit->created) ?></td>
            <td><?= h($credit->type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $credit->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $credit->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $credit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credit->id)]) ?>
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
