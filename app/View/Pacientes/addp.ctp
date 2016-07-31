<?php echo $this->Form->create('Paciente',array('controller' => 'pacientes','action' => 'addp'));?>
	<fieldset>
	<?php
	echo $this->Form->input('nome', array('class' => 'form-control'));
	echo $this->Form->input('login', array('class' => 'form-control'));
	echo $this->Form->input('senha', array('class' => 'form-control'));
	echo $this->Form->end('Adicionar');

	?>
	</fieldset>
