<h3>Total de Exames por Procedimento:<?php count($totalP)?></h3>

<table class="table table-bordered table-hover">

  <tbody>
    <tr>
        <th>Exame</th>
        <th>Valor</th>
        <th>Data</th>
    </tr>

    <?php foreach($totalP as $e): ?>
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
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
