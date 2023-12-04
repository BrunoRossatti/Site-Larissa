<?php

require_once "./class/connect_db.php";
require_once "./class/RepositorioPacientes.php";
require_once "./class/Paciente.php";

$repositorioPacientes = new RepositorioPacientes($pdo);
$repositorioPacientes->excluirPacienteById($_POST['id']);


header("location:admin.php");