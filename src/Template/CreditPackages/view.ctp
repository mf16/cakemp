<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Credit Package'), ['action' => 'edit', $creditPackage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit Package'), ['action' => 'delete', $creditPackage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditPackage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credit Packages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Package'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="creditPackages view large-10 medium-9 columns">
    <h2><?= h($creditPackage->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($creditPackage->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($creditPackage->id) ?></p>
            <h6 class="subheader"><?= __('Credits') ?></h6>
            <p><?= $this->Number->format($creditPackage->credits) ?></p>
            <h6 class="subheader"><?= __('Price') ?></h6>
            <p><?= $this->Number->format($creditPackage->price) ?></p>
            <h6 class="subheader"><?= __('Recurring') ?></h6>
            <p><?= $this->Number->format($creditPackage->recurring) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Purchases') ?></h4>
    <?php if (!empty($creditPackage->purchases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Account Id') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Total') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Token') ?></th>
            <th><?= __('Credit Package Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($creditPackage->purchases as $purchases): ?>
        <tr>
            <td><?= h($purchases->id) ?></td>
            <td><?= h($purchases->account_id) ?></td>
            <td><?= h($purchases->quantity) ?></td>
            <td><?= h($purchases->total) ?></td>
            <td><?= h($purchases->created) ?></td>
            <td><?= h($purchases->token) ?></td>
            <td><?= h($purchases->credit_package_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Purchases', 'action' => 'view', $purchases->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Purchases', 'action' => 'edit', $purchases->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
