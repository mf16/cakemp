<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List User Metas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userMetas form large-10 medium-9 columns">
    <?= $this->Form->create($userMeta); ?>
    <fieldset>
        <legend><?= __('Add User Meta') ?></legend>
        <?php
            echo $this->Form->input('address');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('zip');
            echo $this->Form->input('github_username');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
