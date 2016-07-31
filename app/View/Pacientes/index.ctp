<?php echo $this->Html->link("Editar dados pessoais",array('controller' => 'admin','action' => 'editar'));?></br>

<?php echo $this->Html->link("Excluir Conta",array('controller' => 'admin','action' => 'excluir'));?></br>


<?php echo $this->Html->link("Agendar novo exame",array('controller' => 'pacientes','action' => 'add'));?><br></br>

  <h1> Exames</h1>
  <hr/>
  <table class="table table-bordered table-hover">
    <tbody>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Data</th>
        <th>Açoes</th>

      </tr>

      <?php foreach($exames as $e): ?>
        <tr>
          <td>
            <?php echo $e['Procedimento']['nome']; ?>
          </td>
          <td>
            <?php echo $e['Procedimento']['preco']; ?>
          </td>
          <td>
            <?php echo $e['Exame']['data']; ?>
          </td>
          <td><?php echo $this->Html->link('Editar', array('action' => 'editarE', $e['Exame']['id'])); ?>
            | <?php echo $this->Html->link('Excluir', array('action' => 'excluirE',$e['Exame']['id']), array('confirm' => 'Confirma exclusão?')
            ); ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
