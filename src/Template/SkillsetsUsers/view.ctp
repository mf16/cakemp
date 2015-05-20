<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Skillsets User'), ['action' => 'edit', $skillsetsUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skillsets User'), ['action' => 'delete', $skillsetsUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsetsUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillsets User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsetsUsers view large-10 medium-9 columns">
    <h2><?= h($skillsetsUser->user_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $skillsetsUser->has('user') ? $this->Html->link($skillsetsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsetsUser->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Skillset') ?></h6>
            <p><?= $skillsetsUser->has('skillset') ? $this->Html->link($skillsetsUser->skillset->id, ['controller' => 'Skillsets', 'action' => 'view', $skillsetsUser->skillset->id]) : '' ?></p>
        </div>
    </div>
</div>
