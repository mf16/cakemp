<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Skillsets User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsetsUsers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('skillset_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($skillsetsUsers as $skillsetsUser): ?>
        <tr>
            <td>
                <?= $skillsetsUser->has('user') ? $this->Html->link($skillsetsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsetsUser->user->id]) : '' ?>
            </td>
            <td>
                <?= $skillsetsUser->has('skillset') ? $this->Html->link($skillsetsUser->skillset->id, ['controller' => 'Skillsets', 'action' => 'view', $skillsetsUser->skillset->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $skillsetsUser->user_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skillsetsUser->user_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skillsetsUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsetsUser->user_id)]) ?>
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
