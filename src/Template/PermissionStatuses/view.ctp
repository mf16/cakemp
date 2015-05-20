<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Permission Status'), ['action' => 'edit', $permissionStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission Status'), ['action' => 'delete', $permissionStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permission Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission Status'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="permissionStatuses view large-10 medium-9 columns">
    <h2><?= h($permissionStatus->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($permissionStatus->status) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($permissionStatus->id) ?></p>
        </div>
    </div>
</div>
