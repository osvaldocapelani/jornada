<?php
// session_start inicia a sessão
session_start();
if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome']);
  unset($_SESSION['cpf']);
  unset($_SESSION['senha']);
  unset($_SESSION['nivel']);
}
 
$logado = $_SESSION['nome'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="O IFMT Câmpus São Vicente realiza a sua IX Jornada Científica de Ensino, Pesquisa e Extensão.">
    <meta name="author" content="Osvaldo Capelani, Kamila Barata e Otto Ahlert">
    <meta name="generator" content="Visual Studio Code V1.25.1">
    
    <link rel="icon" href="imagens/favicon.ico" />
    
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/estilos.css">

    
    <title>9ª Jornada Científica</title>
</head>
<body>
<div class="container">



  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="./"><img src="imagens/navIcon.jpg" width="32px"/> IX Jornada</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./">Início <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=programacao">Programação</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=anais">Anais</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=normas-submissao">Normas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=comite-cientifico">Comitê</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php?p=login">Área do participante</a>
          </li>
          <?php 
            if ($logado){?>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">Sair</a>
            </li>
          <?php
           }
          ?>
        </ul>
      </div>
    </nav>
    <div class="alinhaBanner"><img src="./imagens/bannerTopo.jpg" class="img-fluid" alt="Banner"></div>
</div>


<main role="main" class="container">
  <div class="jumbotron">
  <?php


if ($logado){echo "Bem-vind@ ".$logado. "! <hr />"; }
?>                                    
              



