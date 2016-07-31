<h1>Editar Dados do Paciente:</h1>
<?php
echo $this->Form->create('Paciente');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('nome');
echo $this->Form->input('login');
echo $this->Form->input('senha');
echo $this->Form->input('Alterar', array('type' => 'submit', 'label' => FALSE));
echo $this->Form->end();
?>
