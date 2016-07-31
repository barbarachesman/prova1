<h1>Editar Data do Exame:</h1>
  <?php
  echo $this->Form->create('Exame');
  echo $this->Form->input('id', array('type' => 'hidden'));
  echo $this->Form->input('id_Paciente',array('type' => 'hidden'));
  echo $this->Form->input('id_Procedimento',array('type' => 'hidden'));
  echo $this->Form->input('data');
  echo $this->Form->input('Alterar', array('type' => 'submit', 'label' => FALSE));
  echo $this->Form->end();
  ?>
