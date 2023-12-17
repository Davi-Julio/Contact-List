<?php

include_once "Model/config.php";


if (isset($_POST['cadastrar'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $city = $_POST['city'];

  // Verificar se os campos estão preenchidos
  if (empty($name) || empty($email) || empty($contact)) {
?>
<p style="background-color: brown;" class="msg">
  Preencha os campos obrigatórios (Nome, Email, Contato), por favor!
</p>
<?php
  } else {
    // Usar prepared statements para prevenir SQL Injection
    $stmt = $mysqli->prepare("SELECT * FROM contacts WHERE name = ? OR email = ? OR contact = ?");
    $stmt->bind_param("sss", $name, $email, $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o usuário já existe
    if ($result->num_rows > 0) {
    ?>
<p style="background-color: brown;" class="msg">
  Usúario Já Existe!
</p>
<?php
    } else {
      // Verificar se os campos de nome, email e contato já existem no banco de dados
      $stmt = $mysqli->prepare("SELECT * FROM contacts WHERE name = ? AND email = ? AND contact = ?");
      $stmt->bind_param("sss", $name, $email, $contact);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
      ?>
<p style="background-color: brown;" class="msg">
  Combinação única de Nome, Email e Contato já existe no banco de dados!
</p>
<?php

      } else {
        // Validar o número de caracteres no campo de contato
        $limiteCaracteres = 11;
        if (strlen($contact) < $limiteCaracteres || strlen($contact) > $limiteCaracteres) {
        ?>
<p style="background-color: brown;" class="msg">
  Número de caracteres insuficientes no campo de contato.
</p>
<?php
        } else {
          // validação de Cadastro
          $stmt = $mysqli->prepare("INSERT INTO contacts (name, email, contact, city) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $name, $email, $contact, $city);
          $stmt->execute();

        ?>
<p style="background-color: green;" class="msg">
  Contato inserido com sucesso!
</p>
<?php
        }
      }
    }
  }
}


/*Mostra Usúarios Na tela*/

$sql = 'SELECT * FROM contacts';
$result3 = $mysqli->query($sql);


/*Deletar Contatos*/

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "DELETE FROM contacts WHERE id = $id";
  $result = $mysqli->query($sql);
}