<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Paciente[]|\Cake\Collection\CollectionInterface $pacientes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Novo Paciente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Consultas'), ['controller' => 'Consultas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Consulta'), ['controller' => 'Consultas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pacientes index large-9 medium-8 columns content">
    <h3><?= __('Pacientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cns') ?></th>

                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $paciente): ?>
            <tr>
                <td><?= $this->Number->format($paciente->id) ?></td>
                <td><?= h($paciente->nome) ?></td>
                <td><?= h($paciente->cpf) ?></td>
                <td><?= h($paciente->cns) ?></td>
                <td><?= h($paciente->email) ?></td>
                <td><?= h($paciente->telefone) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $paciente->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $paciente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paciente->id)]) ?>
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
