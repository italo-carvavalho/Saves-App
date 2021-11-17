<?php 

require_once("globals.php");
// require_once("App/Conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/styles.css">    
    <title>SAVESAPP</title>
</head>
<body>

   <header>
        <nav>
            <a class="logo" href="<?=$BASE_URL?>">SAVESAPP</a>
            <ul class="navlist">
                <li><a href="<?= $BASE_URL ?>login.php">Entrar</a></li>
                <li><a href="<?= $BASE_URL ?>cadastro.php">Cadastro</a></li>
            </ul>
        </nav>
    </header>