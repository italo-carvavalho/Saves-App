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

/*$name_prof = "";
$name_cliente = "";
if(isset($_SESSION['profissional_logado']) && $_SESSION['profissional_logado'] == true){
     $name_prof = $_SESSION['name'];
}elseif(isset($_SESSION['cliente_logado']) && $_SESSION['cliente_logado'] == true){
    $name_cliente = $_SESSION['name'];
} */

if(isset($_SESSION['id_user'])){
    $id =  $_SESSION['id_user'];

    $stmt = $conn->query("SELECT * FROM users WHERE id_user = '{$id}'");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

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
        <div>
            <a class="logo" href="<?=$BASE_URL?>">SAVESAPP</a>
        </div>

        <nav class="navbar">
            <?php if(isset($id) && !empty($id)){  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>perfil.php"><?= $user['name'] ?></a>
                <a class="nav-btn" href="<?=$BASE_URL?>buscar_servicos.php">Serviços</a>
                <a class="nav-btn" href="<?=$BASE_URL?>buscar_servicos.php">Clientes</a>
                <a class="nav-btn" href="<?=$BASE_URL?>agenda.php">Agendar</a>
                <a class="nav-btn" href="<?=$BASE_URL?>logout.php">Sair</a>
               <!-- <a href="//$BASE_URLperfil_pro.php"> <img class="guest" type="image/svg+xml" src="//$BASE_URLimages/user.svg"> </a> -->
            <?php }else{  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>#" id="cadastro">Cadastro</a>
                <a class="nav-btn" href="<?=$BASE_URL?>#" id="loguin">Entrar</a>
            <?php }  ?>
        </nav>

        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
     </header>  
</body>
    <?php  if(!empty($menssagens['msg'])){  ?>
            <div class="msg-container">
                <p class="msg <?= $menssagens['type'] ?>"><?= $menssagens['msg'] ?></p>
           </div>
    <?php  }  ?>
    
<!-- modal tela de loguin -->
<div id="log" class="modal">
  <div class="modal-content-log"> 
    
    <h2 class="c-log">Login</h2>
    
    <span class="logclose">&times;</span>    
    <form action="process_loguin.php" method="POST"> 
     
    <div class="input-field">
    <label for="email">E-mail:</label>
        <input required  id="email" type="email" class="validate" name="email" style="width: 15em">
    </div></br>
    
    <div class="input-field">
    <label for="password">Senha:</label>
        <input required type="password" class="validate" id="Senha" name="password" style="width: 15em">
    </div>
  </br>   
  <div class="input-field">
      <input required type="radio" name="radio" value="cliente"/>Cliente
  </div>
  <div class="input-field">
      <input type="radio" name="radio" value="profissional"/>Profissional
  </div>
  </br>
    <button type="submit" class="botao-log">Confirmar</button>
  </form>
  </br>
    <!-- <div>
        <a href="cadastro.php" style="text-decoration:none;font-size: large">
            Cadastro
        </a>
  </div> -->
    <span style="font-size: large">Ou se Conecte Com sua conta</span>      
    <div class="social-fields">
      <div class="social-field facebook" >
          <a href="#" style="text-decoration:none;font-size: large">
              <i class="fab fa-facebook-f"></i>
                Entre com o Facebook
          </a>
   </div>
  </br>
      <div class="social-field google">
          <a href="#" style="text-decoration:none;font-size: large" >
              <i class="fab fa-google"></i>
                Entre com o Google
            </a>
           </div>
          </div>
        </div>
      </div>             
    </div>             
  

  <!-- modal tela de cadastro -->
    <div id="cad" class="modal">
    <div class="modal-content-cad"> 

    <h2 class="c-cad">Cadastro de Usuário</h2>

   <span class="cadclose">&times;</span> 
    <form  action="profissional_process.php" method="POST">
      <input type="hidden" name="type" value="cadastrar_profissional">
        <div class="input-field">
        <label for="nome">Nome Completo:</label>
        <input name="nome"  type="text" class="validate" id="name" style="width: 20em">
        </div>  
      
        <div class="input-field">
        <label for="telefone">Telefone:</label>
        <input name="telefone"  type="tel" class="validate" id="telefone"style="width: 15em">
        </div>          
     
        <div class="input-field">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" class="validate" style="width: 20em"> 
        </div>       
       
        <div class="input-field">
        <label for="password">Senha:</label>
        <input  name="senha" type="password" class="validate" id="senha" style="width: 13em">
        </div>    
    
        <div class="input-field">
        <label for="password">Confirmar Senha:</label>
        <input name="confirmeSenha"  type="password" class="validate" id="confsenha" style="width: 13em">
        </div>
        <br>
        
        <div class="input-field">
        <input type="radio" id="" name="tipo_usuario" value="0"> Cliente
        </div>
        <div class="input-field">
        <input type="radio" id="" name="tipo_usuario" value="1"> Profissional
        </div>
        
        
        <button type="submit" class="botao-cad" >Confirmar</button><br>
        <!-- <a href="login.php" style="text-decoration:none">
        Faça seu Loguin
        </a> -->
    </div>
   </form>
 </div>


<script src="<?=$BASE_URL?>js/script.js"></script>
<script src="<?=$BASE_URL?>js/loguin.js"></script>
<script src="<?=$BASE_URL?>js/cadastro.js"></script>