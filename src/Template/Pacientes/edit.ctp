<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $paciente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paciente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Pacientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Consultas'), ['controller' => 'Consultas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Consulta'), ['controller' => 'Consultas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pacientes form large-9 medium-8 columns content">
    <?= $this->Form->create($paciente) ?>
    <fieldset>
        <legend><?= __('Editar Paciente') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('cpf');
            echo $this->Form->control('cns');
            echo $this->Form->control('senha');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
