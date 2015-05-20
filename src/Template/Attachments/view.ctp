<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Timeline'), ['controller' => 'TaskTimeline', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="attachments view large-10 medium-9 columns">
    <h2><?= h($attachment->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Uri') ?></h6>
            <p><?= h($attachment->uri) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($attachment->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($attachment->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related TaskTimeline') ?></h4>
    <?php if (!empty($attachment->task_timeline)): ?>
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
        <?php foreach ($attachment->task_timeline as $taskTimeline): ?>
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
    <h4 class="subheader"><?= __('Related Tasks') ?></h4>
    <?php if (!empty($attachment->tasks)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Project Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Status Id') ?></th>
            <th><?= __('Assignee') ?></th>
            <th><?= __('Last Assignee') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($attachment->tasks as $tasks): ?>
        <tr>
            <td><?= h($tasks->id) ?></td>
            <td><?= h($tasks->project_id) ?></td>
            <td><?= h($tasks->name) ?></td>
            <td><?= h($tasks->description) ?></td>
            <td><?= h($tasks->status_id) ?></td>
            <td><?= h($tasks->assignee) ?></td>
            <td><?= h($tasks->last_assignee) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
