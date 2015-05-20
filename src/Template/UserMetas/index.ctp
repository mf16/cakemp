<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User Meta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userMetas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('address') ?></th>
            <th><?= $this->Paginator->sort('city') ?></th>
            <th><?= $this->Paginator->sort('state') ?></th>
            <th><?= $this->Paginator->sort('zip') ?></th>
            <th><?= $this->Paginator->sort('github_username') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($userMetas as $userMeta): ?>
        <tr>
            <td>
                <?= $userMeta->has('user') ? $this->Html->link($userMeta->user->id, ['controller' => 'Users', 'action' => 'view', $userMeta->user->id]) : '' ?>
            </td>
            <td><?= h($userMeta->address) ?></td>
            <td><?= h($userMeta->city) ?></td>
            <td><?= h($userMeta->state) ?></td>
            <td><?= h($userMeta->zip) ?></td>
            <td><?= h($userMeta->github_username) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $userMeta->user_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMeta->user_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMeta->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMeta->user_id)]) ?>
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
