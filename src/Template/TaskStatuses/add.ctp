<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Task Statuses'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="taskStatuses form large-10 medium-9 columns">
    <?= $this->Form->create($taskStatus); ?>
    <fieldset>
        <legend><?= __('Add Task Status') ?></legend>
        <?php
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
