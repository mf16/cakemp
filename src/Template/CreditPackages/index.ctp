<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Credit Package'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="creditPackages index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('credits') ?></th>
            <th><?= $this->Paginator->sort('price') ?></th>
            <th><?= $this->Paginator->sort('recurring') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($creditPackages as $creditPackage): ?>
        <tr>
            <td><?= $this->Number->format($creditPackage->id) ?></td>
            <td><?= h($creditPackage->name) ?></td>
            <td><?= $this->Number->format($creditPackage->credits) ?></td>
            <td><?= $this->Number->format($creditPackage->price) ?></td>
            <td><?= $this->Number->format($creditPackage->recurring) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $creditPackage->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $creditPackage->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $creditPackage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditPackage->id)]) ?>
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
