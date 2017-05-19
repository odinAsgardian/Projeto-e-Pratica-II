<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Impressions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="impressions form large-9 medium-8 columns content">
    <?= $this->Form->create($impression) ?>
    <fieldset>
        <legend><?= __('Add Impression') ?></legend>
        <?php
            echo $this->Form->input('solicitante');
            echo $this->Form->input('arquivo');
            echo $this->Form->input('num_copias');
            echo $this->Form->input('frente_verso');
            echo $this->Form->input('observacao');
            echo $this->Form->input('status');
            echo $this->Form->input('retorno');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
