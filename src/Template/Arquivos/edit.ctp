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
                ['action' => 'delete', $arquivo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="arquivos form large-9 medium-8 columns content">
    <?= $this->Form->create($arquivo) ?>
    <fieldset>
        <legend><?= __('Edit Arquivo') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
