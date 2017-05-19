<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comprovante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comprovante->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comprovantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comprovantes'), ['controller' => 'Comprovantes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comprovante'), ['controller' => 'Comprovantes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comprovantes form large-9 medium-8 columns content">
    <?= $this->Form->create($comprovante) ?>
    <fieldset>
        <legend><?= __('Edit Comprovante') ?></legend>
        <?php
            echo $this->Form->input('data');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('aproved');
            echo $this->Form->input('comprovante_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
