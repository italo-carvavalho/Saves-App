<?php 

require_once("globals.php");
require_once("conexao.php");
require_once("Model/Message.php");
require_once("Dao/ClienteDao.php");
require_once("Dao/WorkerDao.php");

$message = new Message($BASE_URL);

$menssagens = $message->getMessage();

if(!empty($menssagens['msg'])){

    //limpar a menssagem
    $message->clearMessage();
}

$userDao = new ClienteDao($conn,$BASE_URL);

$workerDao = new WorkerDao($conn,$BASE_URL);

//chama um metodo que vai pegar o dados do usuario
$userData =$userDao->verifyToken(false);

$workerData =$workerDao->verifyToken(false);



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
                <? if($userData){     ?>
                    <a href="<?=$BASE_URL?>cadastro.php" class="button-nav">Listar Prossionais</a>
                    <a href="<?=$BASE_URL?>cadastro.php" class="button-nav">Cadastrar Serviço</a>
                    <a href="<?=$BASE_URL?>cadastro.php" class="button-nav"><?= $userData->name ?></a>
                    <a href="<?=$BASE_URL?>logout.php" class="button-nav" id="nav-sign-in">Sair</a>
                <? }else if($workerData){ ?>
                    <a href="<?=$BASE_URL?>cadastro.php" class="button-nav">Buscar Serviço</a>
                    <a href="<?=$BASE_URL?>editar_profissional.php" class="button-nav"><?= $workerData->name ?></a>
                    <a href="<?=$BASE_URL?>logout.php" class="button-nav" id="nav-sign-in">Sair</a>
                <? }else{  ?>
                  
                    <a href="<?=$BASE_URL?>cadastro.php" class="button-nav">Cadastro</a>
                    <a href="<?=$BASE_URL?>login.php" class="button-nav" id="nav-sign-in">Entrar</a>
                <?    }    ?>
            </div>
                
        </nav>

        <?php  if(!empty($menssagens['msg'])){  ?>
            <div class="msg-container">
                <p class="msg <?= $menssagens['type'] ?>"><?= $menssagens['msg'] ?></p>
           </div>
            <?php  }  ?>

    </header>  
    </div>
   