<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects Permissions'), ['controller' => 'ProjectsPermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects Permission'), ['controller' => 'ProjectsPermissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Metas'), ['controller' => 'UserMetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Meta'), ['controller' => 'UserMetas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Role') ?></h6>
            <p><?= h($user->role) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($user->last_name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Account') ?></h6>
            <p><?= $this->Number->format($user->account) ?></p>
            <h6 class="subheader"><?= __('Manager') ?></h6>
            <p><?= $this->Number->format($user->manager) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ProjectsPermissions') ?></h4>
    <?php if (!empty($user->projects_permissions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Project Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Status Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->projects_permissions as $projectsPermissions): ?>
        <tr>
            <td><?= h($projectsPermissions->project_id) ?></td>
            <td><?= h($projectsPermissions->user_id) ?></td>
            <td><?= h($projectsPermissions->status_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ProjectsPermissions', 'action' => 'view', $projectsPermissions->project_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectsPermissions', 'action' => 'edit', $projectsPermissions->project_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectsPermissions', 'action' => 'delete', $projectsPermissions->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsPermissions->project_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related UserMetas') ?></h4>
    <?php if (!empty($user->user_metas)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Address') ?></th>
            <th><?= __('City') ?></th>
            <th><?= __('State') ?></th>
            <th><?= __('Zip') ?></th>
            <th><?= __('Github Username') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->user_metas as $userMetas): ?>
        <tr>
            <td><?= h($userMetas->user_id) ?></td>
            <td><?= h($userMetas->address) ?></td>
            <td><?= h($userMetas->city) ?></td>
            <td><?= h($userMetas->state) ?></td>
            <td><?= h($userMetas->zip) ?></td>
            <td><?= h($userMetas->github_username) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'UserMetas', 'action' => 'view', $userMetas->user_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'UserMetas', 'action' => 'edit', $userMetas->user_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserMetas', 'action' => 'delete', $userMetas->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMetas->user_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Skillsets') ?></h4>
    <?php if (!empty($user->skillsets)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Skill') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->skillsets as $skillsets): ?>
        <tr>
            <td><?= h($skillsets->id) ?></td>
            <td><?= h($skillsets->skill) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Skillsets', 'action' => 'view', $skillsets->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Skillsets', 'action' => 'edit', $skillsets->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skillsets', 'action' => 'delete', $skillsets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsets->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
