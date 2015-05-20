<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Credit Status'), ['action' => 'edit', $creditStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Credit Status'), ['action' => 'delete', $creditStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $creditStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Credit Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Credit Status'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="creditStatuses view large-10 medium-9 columns">
    <h2><?= h($creditStatus->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($creditStatus->status) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($creditStatus->id) ?></p>
        </div>
    </div>
</div>
