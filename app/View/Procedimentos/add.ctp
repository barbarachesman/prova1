<h1>Adcicionar procedimento</h1>
  <?php
  echo $this->Form->create('Procedimento');
  echo $this->Form->input('nome');
  echo $this->Form->input('preco');
  echo$this->Form->end('Salvar');
  ?>
