<h3>Listagem de Pacientes Cadastrados</h3>

<table class="table table-bordered table-hover">
  <tbody>
    <tr>
      <th>Nome</th>
      <th>Ações</th>
    </tr>

    <?php foreach($pacientes as $e): ?>
      <tr>
        <td>
          <?php echo $e['Paciente']['nome']; ?>
        </td>
        <td>
          <?php echo $this->Html->link('Alterar', array('action' => 'editar', $e['Paciente']['id'])); ?>
          | <?php echo $this->Html->link( 'Excluir', array('action' => 'excluir',$e['Paciente']['id']), array('confirm' => 'Confirma exclusão?')); ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
