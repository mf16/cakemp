<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Credit'), ['action' => 'edit', $credit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit'), ['action' => 'delete', $credit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $credit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="credits view large-10 medium-9 columns">
    <h2><?= h($credit->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Purchase') ?></h6>
            <p><?= $credit->has('purchase') ? $this->Html->link($credit->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $credit->purchase->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Account') ?></h6>
            <p><?= $credit->has('account') ? $this->Html->link($credit->account->name, ['controller' => 'Accounts', 'action' => 'view', $credit->account->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($credit->type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($credit->id) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($credit->status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($credit->created) ?></p>
        </div>
    </div>
</div>
