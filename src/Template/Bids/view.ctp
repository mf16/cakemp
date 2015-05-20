<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Bid'), ['action' => 'edit', $bid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bid'), ['action' => 'delete', $bid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bids view large-10 medium-9 columns">
    <h2><?= h($bid->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Task') ?></h6>
            <p><?= $bid->has('task') ? $this->Html->link($bid->task->name, ['controller' => 'Tasks', 'action' => 'view', $bid->task->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Bidder Id') ?></h6>
            <p><?= h($bid->bidder_id) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($bid->id) ?></p>
            <h6 class="subheader"><?= __('Work Time') ?></h6>
            <p><?= $this->Number->format($bid->work_time) ?></p>
            <h6 class="subheader"><?= __('Wait Time') ?></h6>
            <p><?= $this->Number->format($bid->wait_time) ?></p>
        </div>
    </div>
</div>
