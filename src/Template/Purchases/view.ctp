<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credit Packages'), ['controller' => 'CreditPackages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Package'), ['controller' => 'CreditPackages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="purchases view large-10 medium-9 columns">
    <h2><?= h($purchase->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Account') ?></h6>
            <p><?= $purchase->has('account') ? $this->Html->link($purchase->account->name, ['controller' => 'Accounts', 'action' => 'view', $purchase->account->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Token') ?></h6>
            <p><?= h($purchase->token) ?></p>
            <h6 class="subheader"><?= __('Credit Package') ?></h6>
            <p><?= $purchase->has('credit_package') ? $this->Html->link($purchase->credit_package->name, ['controller' => 'CreditPackages', 'action' => 'view', $purchase->credit_package->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($purchase->id) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($purchase->quantity) ?></p>
            <h6 class="subheader"><?= __('Total') ?></h6>
            <p><?= $this->Number->format($purchase->total) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($purchase->created) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Credits') ?></h4>
    <?php if (!empty($purchase->credits)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Purchase Id') ?></th>
            <th><?= __('Account Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($purchase->credits as $credits): ?>
        <tr>
            <td><?= h($credits->id) ?></td>
            <td><?= h($credits->status) ?></td>
            <td><?= h($credits->purchase_id) ?></td>
            <td><?= h($credits->account_id) ?></td>
            <td><?= h($credits->created) ?></td>
            <td><?= h($credits->type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Credits', 'action' => 'view', $credits->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Credits', 'action' => 'edit', $credits->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Credits', 'action' => 'delete', $credits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credits->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
