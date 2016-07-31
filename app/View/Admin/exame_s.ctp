<h3> Exames Solicitados</h3>
<table class="table table-bordered table-hover">

  <tbody>
    <tr>
      <th>Exame</th>
      <th>Paciente</th>
      <th>Valor</th>
      <th>Data</th>
      <th>Ações</th>
    </tr>

    <?php foreach($exameS as $e): ?>
      <tr>
        <td>
          <?php echo $e['Procedimento']['nome']; ?>
        </td>
        <td>
          <?php echo $e['Paciente']['nome']; ?>
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
