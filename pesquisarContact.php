<?php

include_once 'Template/template.php';

// Pesquisar Por Contatos

?>

<div class="container-form">
  <form class="form2" method="GET">
    <label>Pesquise Pelo Seu Contato</label>
    <input required type="text" name="buscar" class="form-control" id="formGroupExampleInput"
      placeholder="Digite O Nome dos seus Contatos">
    <button id="btn2" type="submit" class="btn btn-primary">Pesquisar</button>
  </form>
  <!--form2 -->
</div>
<!--container-form-->

<table id="table" class="table table-striped">

  <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Contact</th>
    <th>City</th>
  </tr>

  <?php
  if (isset($_GET['buscar'])) {
    $pesquisar = '%' . $mysqli->real_escape_string($_GET['buscar']) . '%';

    $sql = "SELECT * FROM contacts WHERE name LIKE ? OR email LIKE ? OR contact LIKE ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sss', $pesquisar, $pesquisar, $pesquisar);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
  ?>
  <tr>
    <td colspan="4">Nenhum Resultado Encontrado!</td>
  </tr>
  <?php
    } else {
      while ($dados = $result->fetch_assoc()) {
      ?>
  <tr>
    <td><?= $dados['name'] ?></td>
    <td><?= $dados['email'] ?></td>
    <td><?= $dados['contact'] ?></td>
    <td><?= $dados['city'] ?></td>
  </tr>
  <?php
      }
    }
  } else {
    ?>
  <tr>
    <td colspan="4">Digite algo para Pesquisar!</td>
  </tr>
  <?php
  }
  ?>
</table>
<!--table-->