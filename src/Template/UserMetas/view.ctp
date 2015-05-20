<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User Meta'), ['action' => 'edit', $userMeta->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Meta'), ['action' => 'delete', $userMeta->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMeta->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Meta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userMetas view large-10 medium-9 columns">
    <h2><?= h($userMeta->user_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $userMeta->has('user') ? $this->Html->link($userMeta->user->id, ['controller' => 'Users', 'action' => 'view', $userMeta->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($userMeta->address) ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= h($userMeta->city) ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= h($userMeta->state) ?></p>
            <h6 class="subheader"><?= __('Zip') ?></h6>
            <p><?= h($userMeta->zip) ?></p>
            <h6 class="subheader"><?= __('Github Username') ?></h6>
            <p><?= h($userMeta->github_username) ?></p>
        </div>
    </div>
</div>
