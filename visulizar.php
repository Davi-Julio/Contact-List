<?php

include_once 'Template/template.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $current;

  foreach ($result3 as $value) {
    if ($value['id'] == $id) {
      $current = $value;
    }
  }
}

?>

<table id="table" class="table table-striped">

  <tr>
    <th>N:</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Contact</th>
    <th>City</th>

  </tr>

  <tr>
    <td><?= $current['id'] ?>
    <td><?= $current['name'] ?>
    </td>
    <td><?= $current['email'] ?>
    </td>
    <td><?= $current['contact'] ?>
    </td>
    <td><?= $current['city'] ?>
    </td>
  </tr>

</table>
<!--table-->