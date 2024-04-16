<?php
session_start();
ob_start();
require "./class/connect_db.php";
require "./class/RepositorioPacientes.php";
require "./class/Paciente.php";

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
  $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
  header("Location: index.php");
}


$repositorioPacientes = new RepositorioPacientes($pdo);
$pacientes = $repositorioPacientes->buscarPaciente();


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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Larissa Esteves - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="css/img/marca/logoemalta_/06.png" class="logo-admin" alt="logo-larissa">
    <h1>Pacientes - Larissa Esteves</h1>
    <!-- <img class= "ornaments" src="css/img/ornaments/ornament.png" alt="ornaments"> -->
  </section>
  <h2>Lista de Pacientes</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Paciente</th>
          <th>CPF</th>
          <th>Sexo</th>
          <th>Data Nascimento</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Queixa Principal</th>
          <th>Valor Secão</th>          
          <th>Data de Criação</th>
          
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($pacientes as $paciente): ?>
      <tr>
        <td><?= $paciente->getId() ?></td>
        <td><?= $paciente->getNome() ?></td>
        <td><?= $paciente->getCpf() ?></td>
        <td><?= $paciente->getSexo() ?></td>
        <td><?= $paciente->getDtNas() ?></td>
        <td><?= $paciente->getTelefone() ?></td>
        <td><?= $paciente->getEmail() ?></td>
        <td><?= $paciente->getQueixa() ?></td>
        <td><?= $paciente->getValorSecao()?></td>        
        <td><?= $paciente->getDtCriacao() ?> </td>
       
        <td><a class="botao-editar" href="editar-produto.php?id=<?= $paciente->getId() ?>">Editar</a></td>
        <td>
          <form action = "excluir-paciente.php" method="post">
            <input type="hidden" name="id" value="<?=$paciente->getId() ?>">
            <input type="submit" class="botao-excluir" value="Excluir">
          </form>
        </td>
        
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-paciente.php">Cadastrar paciente</a>
  <!-- <form action="#" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form> -->
  </section>
</main>
</body>
</html>