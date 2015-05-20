<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Task Status'), ['action' => 'edit', $taskStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task Status'), ['action' => 'delete', $taskStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Task Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Status'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="taskStatuses view large-10 medium-9 columns">
    <h2><?= h($taskStatus->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($taskStatus->status) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($taskStatus->id) ?></p>
        </div>
    </div>
</div>
