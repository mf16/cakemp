<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $creditPackage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $creditPackage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Credit Packages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="creditPackages form large-10 medium-9 columns">
    <?= $this->Form->create($creditPackage); ?>
    <fieldset>
        <legend><?= __('Edit Credit Package') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('credits');
            echo $this->Form->input('price');
            echo $this->Form->input('recurring');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
