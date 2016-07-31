<h1>Editar Procedimento:</h1>
<?php
echo $this->Form->create('Procedimento');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('nome');
echo $this->Form->input('preco');
echo $this->Form->input('Alterar', array('type' => 'submit', 'label' => FALSE));
echo $this->Form->end();
?>
