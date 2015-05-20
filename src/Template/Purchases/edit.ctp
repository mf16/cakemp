<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credit Packages'), ['controller' => 'CreditPackages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Package'), ['controller' => 'CreditPackages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="purchases form large-10 medium-9 columns">
    <?= $this->Form->create($purchase); ?>
    <fieldset>
        <legend><?= __('Edit Purchase') ?></legend>
        <?php
            echo $this->Form->input('account_id', ['options' => $accounts]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('total');
            echo $this->Form->input('token');
            echo $this->Form->input('credit_package_id', ['options' => $creditPackages]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
