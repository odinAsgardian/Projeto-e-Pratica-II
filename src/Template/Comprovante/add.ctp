<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Comprovantes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comprovante form large-9 medium-8 columns content">
    <?= $this->Form->create($comprovante) ?>
    <fieldset>
        <legend><?= __('Adicione Comprovante') ?></legend>
        <?=
            $this->Form->input('siape'),
            $this->Form->input('nome'),
            $this->Form->input('arquivo'),
            $this->Form->input('boleto')
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
