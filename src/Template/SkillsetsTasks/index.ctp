<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Skillsets Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsetsTasks index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('task_id') ?></th>
            <th><?= $this->Paginator->sort('skillset_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($skillsetsTasks as $skillsetsTask): ?>
        <tr>
            <td>
                <?= $skillsetsTask->has('task') ? $this->Html->link($skillsetsTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $skillsetsTask->task->id]) : '' ?>
            </td>
            <td>
                <?= $skillsetsTask->has('skillset') ? $this->Html->link($skillsetsTask->skillset->id, ['controller' => 'Skillsets', 'action' => 'view', $skillsetsTask->skillset->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $skillsetsTask->task_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skillsetsTask->task_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skillsetsTask->task_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsetsTask->task_id)]) ?>
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
