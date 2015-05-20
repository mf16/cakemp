<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Projects Permission'), ['action' => 'edit', $projectsPermission->project_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projects Permission'), ['action' => 'delete', $projectsPermission->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsPermission->project_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permission Statuses'), ['controller' => 'PermissionStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission Status'), ['controller' => 'PermissionStatuses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projectsPermissions view large-10 medium-9 columns">
    <h2><?= h($projectsPermission->project_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= $projectsPermission->has('project') ? $this->Html->link($projectsPermission->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsPermission->project->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $projectsPermission->has('user') ? $this->Html->link($projectsPermission->user->id, ['controller' => 'Users', 'action' => 'view', $projectsPermission->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Permission Status') ?></h6>
            <p><?= $projectsPermission->has('permission_status') ? $this->Html->link($projectsPermission->permission_status->id, ['controller' => 'PermissionStatuses', 'action' => 'view', $projectsPermission->permission_status->id]) : '' ?></p>
        </div>
    </div>
</div>
