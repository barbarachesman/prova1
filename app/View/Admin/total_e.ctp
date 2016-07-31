<h3>Total de Exames por Paciente: <?php count($totalE)?></h3>

<table class="table table-bordered table-hover">

  <tbody>
    <tr>
      <th>Exame</th>
      <th>Paciente</th>
    </tr>
    <?php foreach($totalE as $e): ?>
      <tr>
        <td>
          <?php echo $e['Procedimento']['nome']; ?>
        </td>
        <td>
          <?php echo $e['Paciente']['nome']; ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
