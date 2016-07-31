<br></br><br></br>

<div class="container text-center">
    <div class="row">
  </div>
</div>
<table class="table table-bordered table-hover">

  <tbody>

    <tr>
      <th>Nome</th>
      <th>Preço</th>
    </tr>

    <?php foreach($procedimentos as $p): ?>
      <tr>
        
          <td>
            <?php echo $p['Procedimento']['nome']; ?>
          </td>
          <td>
            <?php echo $p['Procedimento']['preco']; ?>
          </td>


        </tr>

      </tr>
    <?php endforeach ?>

  </tbody>
</table>
