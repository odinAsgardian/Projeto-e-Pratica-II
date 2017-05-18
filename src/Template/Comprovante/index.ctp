<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comprovante'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comprovante index large-9 medium-8 columns content">
    <h3><?= __('Comprovante dos funcionários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('siape') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arquivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleto') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comprovante as $comprovante): ?>
            <tr>
                <td><?= $this->Number->format($comprovante->id) ?></td>
                <td><?= h($comprovante->siape) ?></td>
                <td><?= h($comprovante->nome) ?></td>
                <td><?= h($comprovante->arquivo) ?></td>
                <td><?= h($comprovante->boleto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comprovante->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comprovante->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comprovante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprovante->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
