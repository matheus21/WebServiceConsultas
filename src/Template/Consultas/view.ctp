<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Consulta $consulta
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Consulta'), ['action' => 'edit', $consulta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Consulta'), ['action' => 'delete', $consulta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Consultas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consulta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pacientes'), ['controller' => 'Pacientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paciente'), ['controller' => 'Pacientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="consultas view large-9 medium-8 columns content">
    <h3><?= h($consulta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Paciente') ?></th>
            <td><?= $consulta->has('paciente') ? $this->Html->link($consulta->paciente->id, ['controller' => 'Pacientes', 'action' => 'view', $consulta->paciente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($consulta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situacao') ?></th>
            <td><?= $this->Number->format($consulta->situacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($consulta->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($consulta->hora) ?></td>
        </tr>
    </table>
</div>
