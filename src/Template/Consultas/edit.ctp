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
                ['action' => 'delete', $consulta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Consultas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Pacientes'), ['controller' => 'Pacientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Paciente'), ['controller' => 'Pacientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="consultas form large-9 medium-8 columns content">
    <?= $this->Form->create($consulta) ?>
    <fieldset>
        <legend><?= __('Editar Consulta') ?></legend>
        <?php
            echo $this->Form->control('paciente_id', ['options' => $pacientes, 'empty' => true]);
            echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('hora', ['empty' => true]);
            //echo $this->Form->control('situacao');
            echo $this->Form->control('situacao_id', ['options' => $situacao_consultas, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
