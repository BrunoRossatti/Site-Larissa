<?php

require "./class/connect_db.php";
require "./class/RepositorioPacientes.php";
require "./class/Paciente.php";


$repositorioPacientes = new RepositorioPacientes($pdo);

if (isset($_POST['editar'])){
  $paciente = new Paciente(
  $_POST['id'],
  $_POST['nome'],
  $_POST['cpf'],
  $_POST['sexo'],
  $_POST['dt_nas'],
  $_POST['telefone'],
  $_POST['email'],
  $_POST['queixa_principal'],
  $_POST['valor'],
  $_POST['data_criacao']);
  
  $repositorioPacientes = new RepositorioPacientes($pdo);
  $repositorioPacientes->atualizarPaciente($paciente);
   
  header("location:admin.php");
}else{
  $paciente = $repositorioPacientes->buscarPacienteById($_GET['id']);
}


?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Editar Produto</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="css/img/marca/logoemalta_/06.png" class="logo-admin" alt="logo-larissa">
    <h1>Editar Produto</h1>
    
  </section>
  <section class="container-form">
    <form method="post">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do paciente" value="<?=$paciente->getNome()?>" required>

            <label for="cpf">CPF</label>
            <input type="number" id="cpf" name="cpf" placeholder="Digite o CPF do paciente" value="<?=$paciente->getCpf()?>" required>

            <label for="sexo">Sexo</label>
            <div class="container-radio">                
                <div>
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="masculino" name="sexo" value="M" <?=$paciente->getSexo() == "M"? "checked":"" ?> >
                </div>
                <div>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="feminino" name="sexo" value="F" <?=$paciente->getSexo() == "F"? "checked":"" ?>>
                </div>
            </div>

            <label for="dt_nas">Data Nascimento:</label>
            <input type="date" id="dt_nas" name="dt_nas" placeholder="Digite a data nascimento do paciente" value="<?=$paciente->getDtNas()?>" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="Digite o telefone do paciente" value="<?=$paciente->getTelefone()?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite o e-mail do paciente" value="<?=$paciente->getEmail()?>" required>
            
          
            <label for="queixa_principal">Queixa Principal</label>
            <<input type="queixa_principal" id="queixa_principal" name="queixa_principal" placeholder="Digite a queixa do paciente" value="<?=$paciente->getQueixa()?>" required>>
            

            <label for="valor">Valor da Secão</label>
            <input type="number" id="valor" name="valor" placeholder="Valor da Secão R$" value="<?= $paciente->getValorSecao()?>" required>

          

            <input type="hidden" name="id" value="<?=$paciente->getId() ?>">

      <input type="submit" name="editar" class="botao-cadastrar"  value="Editar produto"/>
    </form>

  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>