  <?php
  echo $this->Form->create('Paciente',array('url' => 'login'));

  echo $this ->Form->input('login',array('label' => 'Nome do usuário' ));

  echo '<label>Senha:</label>';

  echo $this ->Form->password('senha');
  echo $this ->Form->end('Acessar');
   ?>
