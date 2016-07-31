<div class="container text-center">
  <?php  echo $this->Html->link("Inserir", array('controller' => 'procedimentos',  'action'=> 'add')); ?>
</div>
<table class="table table-bordered table-hover">

  <tbody>

    <tr>
      <th>Nome</th>
      <th>Preço</th>
      <th>Ações</th>
    </tr>

    <?php foreach($procedimentos as $p): ?>
      <tr>
          <td>
            <?php echo $p['Procedimento']['nome']; ?>
          </td>
          <td>
            <?php echo $p['Procedimento']['preco']; ?>
          </td>

          <td><?php echo $this->Html->link('Editar', array('action' => 'editarP', $p['Procedimento']['id'])); ?>
            | <?php echo $this->Html->link('Excluir', array('action' => 'excluirP',$p['Procedimento']['id']), array('confirm' => 'Confirma exclusão?')
            ); ?></td>
          </tr>

        </tr>
      <?php endforeach ?>

    </tbody>
  </table>
