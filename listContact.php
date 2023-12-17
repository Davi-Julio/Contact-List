<?php

include_once "Template/template.php";

?>

<table id="table" class="table table-striped">
  <tr>
    <th>N:</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>City</th>
    <th>Action</th>
  </tr>


  <?php
  foreach ($result3 as $users) {
  ?>
  <tr>
    <td><?= $users['id'] ?></td>
    <td><?= $users['name'] ?></td>
    <td><?= $users['email'] ?></td>
    <td><?= $users['contact'] ?></td>
    <td><?= $users['city'] ?></td>
    <td id="icons">
      <a href="visulizar.php?id=<?= $users['id'] ?>"><img src="Icons/visualizar.png" alt=""></a>
      <a href="editar.php?id=<?= $users['id'] ?>"><img src="Icons/editar.png" alt=""></a>
      <a href="?delete=<?= $users['id'] ?>"><img src="Icons/delete.png" alt=""></a>
    </td>
  </tr>
  <?php
  }

  ?>

</table>
<!--table-->