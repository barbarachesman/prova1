<h1>Alterar procedimento</h1>
  <?php
  echo $this->Form->create('Procedimento');
  echo $this->Form->input('nome');
  echo $this->Form->input('preco');
  echo $this->Form->input('Alterar', array('type' => 'submit', 'label' => FALSE));
  echo $this->Form->end();
  ?>
