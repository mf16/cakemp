<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Credits'), ['controller' => 'Credits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit'), ['controller' => 'Credits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="accounts view large-10 medium-9 columns">
    <h2><?= h($account->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($account->type) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($account->name) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($account->password) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($account->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Credits') ?></h4>
    <?php if (!empty($account->credits)): ?>
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
        <?php foreach ($account->credits as $credits): ?>
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
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Projects') ?></h4>
    <?php if (!empty($account->projects)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Account Id') ?></th>
            <th><?= __('Github Url') ?></th>
            <th><?= __('Details') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($account->projects as $projects): ?>
        <tr>
            <td><?= h($projects->id) ?></td>
            <td><?= h($projects->name) ?></td>
            <td><?= h($projects->account_id) ?></td>
            <td><?= h($projects->github_url) ?></td>
            <td><?= h($projects->details) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Purchases') ?></h4>
    <?php if (!empty($account->purchases)): ?>
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
        <?php foreach ($account->purchases as $purchases): ?>
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
