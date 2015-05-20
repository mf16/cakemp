<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Projects Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permission Statuses'), ['controller' => 'PermissionStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission Status'), ['controller' => 'PermissionStatuses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projectsPermissions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('project_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('status_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($projectsPermissions as $projectsPermission): ?>
        <tr>
            <td>
                <?= $projectsPermission->has('project') ? $this->Html->link($projectsPermission->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsPermission->project->id]) : '' ?>
            </td>
            <td>
                <?= $projectsPermission->has('user') ? $this->Html->link($projectsPermission->user->id, ['controller' => 'Users', 'action' => 'view', $projectsPermission->user->id]) : '' ?>
            </td>
            <td>
                <?= $projectsPermission->has('permission_status') ? $this->Html->link($projectsPermission->permission_status->id, ['controller' => 'PermissionStatuses', 'action' => 'view', $projectsPermission->permission_status->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $projectsPermission->project_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsPermission->project_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsPermission->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsPermission->project_id)]) ?>
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
