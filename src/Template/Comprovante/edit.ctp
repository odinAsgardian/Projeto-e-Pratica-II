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
        <li><?= $this->Html->link(__('List Comprovante'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comprovante form large-9 medium-8 columns content">
    <?= $this->Form->create($comprovante) ?>
    <fieldset>
        <legend><?= __('Edit Comprovante') ?></legend>
        <?php
            echo $this->Form->input('siape');
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
