<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Task Statuses'), ['controller' => 'TaskStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Status'), ['controller' => 'TaskStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skillsets'), ['controller' => 'Skillsets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skillset'), ['controller' => 'Skillsets', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="tasks view large-10 medium-9 columns">
    <h2><?= h($task->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= $task->has('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($task->name) ?></p>
            <h6 class="subheader"><?= __('Task Status') ?></h6>
            <p><?= $task->has('task_status') ? $this->Html->link($task->task_status->id, ['controller' => 'TaskStatuses', 'action' => 'view', $task->task_status->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($task->id) ?></p>
            <h6 class="subheader"><?= __('Assignee') ?></h6>
            <p><?= $this->Number->format($task->assignee) ?></p>
            <h6 class="subheader"><?= __('Last Assignee') ?></h6>
            <p><?= $this->Number->format($task->last_assignee) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($task->description)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related TaskTimeline') ?></h4>
    <?php if (!empty($task->task_timeline)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Task Id') ?></th>
            <th><?= __('Author') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Message') ?></th>
            <th><?= __('Attachment Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($task->task_timeline as $taskTimeline): ?>
        <tr>
            <td><?= h($taskTimeline->id) ?></td>
            <td><?= h($taskTimeline->task_id) ?></td>
            <td><?= h($taskTimeline->author) ?></td>
            <td><?= h($taskTimeline->created) ?></td>
            <td><?= h($taskTimeline->message) ?></td>
            <td><?= h($taskTimeline->attachment_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'TaskTimeline', 'action' => 'view', $taskTimeline->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'TaskTimeline', 'action' => 'edit', $taskTimeline->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TaskTimeline', 'action' => 'delete', $taskTimeline->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskTimeline->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Attachments') ?></h4>
    <?php if (!empty($task->attachments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Uri') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($task->attachments as $attachments): ?>
        <tr>
            <td><?= h($attachments->id) ?></td>
            <td><?= h($attachments->uri) ?></td>
            <td><?= h($attachments->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>

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
    <?php if (!empty($task->skillsets)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Skill') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($task->skillsets as $skillsets): ?>
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
