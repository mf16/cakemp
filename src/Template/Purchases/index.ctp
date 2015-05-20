<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credit Packages'), ['controller' => 'CreditPackages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Package'), ['controller' => 'CreditPackages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="purchases index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('account_id') ?></th>
            <th><?= $this->Paginator->sort('quantity') ?></th>
            <th><?= $this->Paginator->sort('total') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('token') ?></th>
            <th><?= $this->Paginator->sort('credit_package_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($purchases as $purchase): ?>
        <tr>
            <td><?= $this->Number->format($purchase->id) ?></td>
            <td>
                <?= $purchase->has('account') ? $this->Html->link($purchase->account->name, ['controller' => 'Accounts', 'action' => 'view', $purchase->account->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($purchase->quantity) ?></td>
            <td><?= $this->Number->format($purchase->total) ?></td>
            <td><?= h($purchase->created) ?></td>
            <td><?= h($purchase->token) ?></td>
            <td>
                <?= $purchase->has('credit_package') ? $this->Html->link($purchase->credit_package->name, ['controller' => 'CreditPackages', 'action' => 'view', $purchase->credit_package->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $purchase->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchase->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?>
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
