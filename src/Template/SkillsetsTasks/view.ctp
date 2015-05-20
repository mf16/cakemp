<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Skillsets Task'), ['action' => 'edit', $skillsetsTask->task_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skillsets Task'), ['action' => 'delete', $skillsetsTask->task_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsetsTask->task_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillsets Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="skillsetsTasks view large-10 medium-9 columns">
    <h2><?= h($skillsetsTask->task_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Task') ?></h6>
            <p><?= $skillsetsTask->has('task') ? $this->Html->link($skillsetsTask->task->name, ['controller' => 'Tasks', 'action' => 'view', $skillsetsTask->task->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Skillset') ?></h6>
            <p><?= $skillsetsTask->has('skillset') ? $this->Html->link($skillsetsTask->skillset->id, ['controller' => 'Skillsets', 'action' => 'view', $skillsetsTask->skillset->id]) : '' ?></p>
        </div>
    </div>
</div>
