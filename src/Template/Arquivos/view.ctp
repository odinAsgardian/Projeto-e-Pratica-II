<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Arquivo'), ['action' => 'edit', $arquivo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Arquivo'), ['action' => 'delete', $arquivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $arquivo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Arquivos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Arquivo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="arquivos view large-9 medium-8 columns content">
    <h3><?= h($arquivo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($arquivo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($arquivo->id) ?></td>
        </tr>
    </table>
</div>
