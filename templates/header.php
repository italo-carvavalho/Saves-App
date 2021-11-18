<?php 

require_once("globals.php");
require_once("conexao.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$menssagens = $message->getMessage();

if(!empty($menssagens['msg'])){

    //limpar a menssagem
    $message->clearMessage();
}

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
    <div class="inv">
    <header>
        <nav>
            <a class="logo" href="<?=$BASE_URL?>">SAVESAPP</a>
            <div>
                <a href="<?=$BASE_URL?>cadastro.php" class="button-nav">Cadastro</a>
                <a href="<?=$BASE_URL?>login.php" class="button-nav" id="nav-sign-in">Entrar</a>
            </div>
                
        </nav>
    </header>  
    </div>
   