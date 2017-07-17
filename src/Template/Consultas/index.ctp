<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Consulta[]|\Cake\Collection\CollectionInterface $consultas
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nova Consulta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Pacientes'), ['controller' => 'Pacientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Paciente'), ['controller' => 'Pacientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="consultas index large-9 medium-8 columns content">
    <h3><?= __('Consultas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paciente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situacao') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td><?= $this->Number->format($consulta->id) ?></td>
                <td><?= $consulta->has('paciente') ? $this->Html->link($consulta->paciente->id, ['controller' => 'Pacientes', 'action' => 'view', $consulta->paciente->id]) : '' ?></td>
                <td><?= h(date_format($consulta->data, 'd/m/Y')) ?></td>
                <td><?= h(date_format($consulta->hora, 'H:i')) ?></td>
                <td><?= h($consulta->situacao_consulta->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $consulta->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $consulta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id)]) ?>
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
        <!--<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
    </div>
</div>
