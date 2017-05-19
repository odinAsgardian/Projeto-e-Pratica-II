<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comprovante'), ['action' => 'edit', $comprovante->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comprovante'), ['action' => 'delete', $comprovante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprovante->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comprovantes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comprovante'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comprovantes'), ['controller' => 'Comprovantes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comprovante'), ['controller' => 'Comprovantes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comprovantes view large-9 medium-8 columns content">
    <h3><?= h($comprovante->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $comprovante->has('user') ? $this->Html->link($comprovante->user->id, ['controller' => 'Users', 'action' => 'view', $comprovante->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comprovante->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comprovante Id') ?></th>
            <td><?= $this->Number->format($comprovante->comprovante_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($comprovante->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comprovante->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comprovante->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aproved') ?></th>
            <td><?= $comprovante->aproved ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comprovantes') ?></h4>
        <?php if (!empty($comprovante->comprovantes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Aproved') ?></th>
                <th scope="col"><?= __('Comprovante Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($comprovante->comprovantes as $comprovantes): ?>
            <tr>
                <td><?= h($comprovantes->id) ?></td>
                <td><?= h($comprovantes->data) ?></td>
                <td><?= h($comprovantes->user_id) ?></td>
                <td><?= h($comprovantes->created) ?></td>
                <td><?= h($comprovantes->modified) ?></td>
                <td><?= h($comprovantes->aproved) ?></td>
                <td><?= h($comprovantes->comprovante_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comprovantes', 'action' => 'view', $comprovantes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comprovantes', 'action' => 'edit', $comprovantes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comprovantes', 'action' => 'delete', $comprovantes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comprovantes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
