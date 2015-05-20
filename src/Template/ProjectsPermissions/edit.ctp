<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectsPermission->project_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectsPermission->project_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projects Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permission Statuses'), ['controller' => 'PermissionStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission Status'), ['controller' => 'PermissionStatuses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projectsPermissions form large-10 medium-9 columns">
    <?= $this->Form->create($projectsPermission); ?>
    <fieldset>
        <legend><?= __('Edit Projects Permission') ?></legend>
        <?php
            echo $this->Form->input('status_id', ['options' => $permissionStatuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
