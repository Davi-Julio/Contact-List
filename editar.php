<?php

include_once "Template/template.php";


// Lógica para editar os Contatos Cadastrados

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM contacts WHERE id = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $contact = $row['contact'];
    $city = $row['city'];
  }
?>


<form class="form" action="" method="post">
  <label>Editar Contatos</label>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Name</label>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input required name="name" value="<?php echo $name; ?>" type="text" class="form-control" id="formGroupExampleInput"
      placeholder="Digite Seu Nome">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Email</label>
    <input required name="email" value="<?php echo $email   ?>" type="email" class="form-control"
      id="formGroupExampleInput2" placeholder="Digite Seu Email">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Contact</label>
    <input required name="contact" value="<?php echo $contact ?>" type="number" class="form-control"
      id="formGroupExampleInput" placeholder="Digite Seu Contato">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">City</label>
    <input required name="city" value="<?php echo $city ?>" type="text" class="form-control" id="formGroupExampleInput2"
      placeholder="Digite Sua Cidade">
  </div>
  <button id="btnEditar" type="submit" class="btn btn-primary">Editar</button>
</form>

<?php

  // Editar Usúarios

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nameEditar = $_POST['name'];
    $emailEditar = $_POST['email'];
    $contactEditar = $_POST['contact'];
    $cityEditar = $_POST['city'];

    if (!empty($nameEditar) && !empty($emailEditar) && !empty($contactEditar) && !empty($cityEditar)) {
      updateContact($mysqli, $id, $nameEditar, $emailEditar, $contactEditar, $cityEditar);
    } else {
      echo "Todos os campos são obrigatórios.";
    }
  }
}

function updateContact($mysqli, $id, $name, $email, $contact, $city)
{
  $sql = "UPDATE contacts SET name = ?, email = ?, contact = ?, city = ? WHERE id = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('ssisi', $name, $email, $contact, $city, $id);

  if ($stmt->execute()) {
    header("Location: listContact.php");
  } else {
    echo 'Erro ao atualizar usuário: ' . $stmt->error;
  }
}

?>