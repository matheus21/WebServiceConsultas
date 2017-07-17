<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Paciente $paciente
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paciente'), ['action' => 'edit', $paciente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paciente'), ['action' => 'delete', $paciente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paciente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pacientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paciente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Consultas'), ['controller' => 'Consultas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consulta'), ['controller' => 'Consultas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pacientes view large-9 medium-8 columns content">
    <h3><?= h($paciente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($paciente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($paciente->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cns') ?></th>
            <td><?= h($paciente->cns) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($paciente->senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($paciente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($paciente->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paciente->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Consultas') ?></h4>
        <?php if (!empty($paciente->consultas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Paciente Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Hora') ?></th>
                <th scope="col"><?= __('Situacao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($paciente->consultas as $consultas): ?>
            <tr>
                <td><?= h($consultas->id) ?></td>
                <td><?= h($consultas->paciente_id) ?></td>
                <td><?= h($consultas->data) ?></td>
                <td><?= h($consultas->hora) ?></td>
                <td><?= h($consultas->situacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Consultas', 'action' => 'view', $consultas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Consultas', 'action' => 'edit', $consultas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consultas', 'action' => 'delete', $consultas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
