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

$name_prof = "";
$name_cliente = "";
if(isset($_SESSION['profissional_logado']) && $_SESSION['profissional_logado'] == true){
     $name_prof = $_SESSION['name'];
}elseif(isset($_SESSION['cliente_logado']) && $_SESSION['cliente_logado'] == true){
    $name_cliente = $_SESSION['name'];
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>SAVESAPP</title>
</head>
<body>

    <header>
        <div class="brand">
            <a href="<?=$BASE_URL?>">SAVESAPP</a>
        </div>

        <nav class="navbar">
            <?php if(isset($name_prof) && !empty($name_prof)){  ?>
                <a href="<?=$BASE_URL?>editar_profissional.php"><?= $name_prof?></a>
                <a href="<?=$BASE_URL?>buscar_servicos.php">Buscar Serviços</a>
                <a href="<?=$BASE_URL?>logout.php">Sair</a>
            <?php }elseif(isset($name_cliente) && !empty($name_prof)){ ?>
                <a href="<?=$BASE_URL?>perfil_cliente.php"><?= $name_cliente ?></a>
                <a href="<?=$BASE_URL?>buscar_profissional.php">Listar Profissional</a>
                <a href="<?=$BASE_URL?>meus_pedidos.php">Meus Pedidos</a>
                <a href="<?=$BASE_URL?>logout.php">Sair</a>
            <?php }else{  ?>
                <a href="<?=$BASE_URL?>cadastro.php">Cadastro</a>
                <a href="<?=$BASE_URL?>loguin.php">Loguin</a>
            <?php }  ?>
        </nav>

        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
     </header>  

    <?php  if(!empty($menssagens['msg'])){  ?>
            <div class="msg-container">
                <p class="msg <?= $menssagens['type'] ?>"><?= $menssagens['msg'] ?></p>
           </div>
    <?php  }  ?>
    
    

    <script src="<?=$BASE_URL?>js/script.js"></script>