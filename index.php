<?php

include_once 'Template/template.php';

?>


<main class="main">
  <form class="form" action="" method="post">
    <label>Cadastre Seu Contato</label>
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">Name</label>
      <input required name="name" type="text" class="form-control" id="formGroupExampleInput"
        placeholder="Digite Seu Nome">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">Email</label>
      <input required name="email" type="email" class="form-control" id="formGroupExampleInput2"
        placeholder="Digite Seu Email">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput" class="form-label">Contact</label>
      <input required name="contact" type="number" class="form-control" id="formGroupExampleInput"
        placeholder="Digite Seu Contato">
    </div>
    <div class="mb-3">
      <label for="formGroupExampleInput2" class="form-label">City</label>
      <input required name="city" type="text" class="form-control" id="formGroupExampleInput2"
        placeholder="Digite Sua Cidade">
    </div>
    <button id="btnCadastro" type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
  </form>
  <!--form-->

</main>
<!--main-->