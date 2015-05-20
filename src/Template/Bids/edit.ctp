<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bid->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bid->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bids'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bids form large-10 medium-9 columns">
    <?= $this->Form->create($bid); ?>
    <fieldset>
        <legend><?= __('Edit Bid') ?></legend>
        <?php
            echo $this->Form->input('bidder_id');
            echo $this->Form->input('work_time');
            echo $this->Form->input('wait_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
