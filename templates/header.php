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
        <div>
            <a class="logo" href="<?=$BASE_URL?>">SAVESAPP</a>
        </div>

        <nav class="navbar">
            <?php if(isset($name_prof) && !empty($name_prof)){  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>editar_profissional.php"><?= $name_prof?></a>
                <a class="nav-btn" href="<?=$BASE_URL?>buscar_servicos.php">Buscar Serviços</a>
                <a class="nav-btn" href="<?=$BASE_URL?>logout.php">Sair</a>
                <a href="<?=$BASE_URL?>perfil_pro.php"> <img class="guest" type="image/svg+xml" src="<?=$BASE_URL?>images/user.svg"> </a>
            <?php }elseif(isset($name_cliente) && !empty($name_cliente)){ ?>
                <a class="nav-btn" href="<?=$BASE_URL?>perfil_cliente.php"><?= $name_cliente ?></a>
                <a class="nav-btn" href="<?=$BASE_URL?>buscar_profissionais.php">Profissionais</a>
                <a class="nav-btn" href="<?=$BASE_URL?>Servicos.php">Serviços</a>
                <a class="nav-btn" href="<?=$BASE_URL?>logout.php">Sair</a>
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
  <div class="modal-content"> 
  <!-- <span class="close">&times;</span>    -->
    <form action="process_loguin.php" method="POST">    
        <h2>Login</h2>
          
    <div>
        <input required  id="email" type="email" class="validate" name="email"  placeholder="Email">
  </div>
    <div>
        <input required type="password" class="validate" id="Senha" name="password" placeholder="">
  </div>   
    <div>
      <input required type="radio" name="radio" value="cliente"/><span style="font-size:12px"> Cliente</span><br>
      <input type="radio" name="radio" value="profissional"/><span style="font-size:12px"> Profissional</span><br>
    </div>
    <button type="submit" >Confirmar</button>
  </form>
    <div>
        <a href="cadastro.php" style="text-decoration:none;font-size: large">
            Cadastro
        </a>
  </div>
    <span style="font-size: large">Ou Conecte Com sua Conta Social</span>      
    <div class="social-fields">
      <div class="social-field facebook" >
          <a href="#" style="text-decoration:none;font-size: large">
              <i class="fab fa-facebook-f"></i>
                Entre com o Facebook
          </a>
   </div>
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
  </main>

  <!-- modal tela de cadastro -->
  <main>
  <div id="cad" class="modal">
  <div class="modal-content"> 
  <!-- <button2 class="close">&times;</button2>  -->
    <form  action="profissional_process.php" method="POST">
      <input type="hidden" name="type" value="cadastrar_profissional">
        <h4>Cadastro do usuário</h4>
      <div class="">
        <div class="input-field">
          <input name="nome"  id="full_name" type="text" class="validate" id="name">
          <label for="full_name">Nome Completo</label>
        </div>
      </div>
      <div class="">
       <div class="input-field">
          <input name="telefone" id="icon_telephone" type="telephone" class="validate" id="telefone">
          <label for="icon_telephone">Telefone</label>
        </div>
      </div>    
      <div class="">
        <div class="input-field">
          <input type="email" id="email" name="email" class="validate"> 
          <label for="email">E-mail</label>
        </div>
       </div>
       <div class="">
      <div class="input-field">
        <input  name="senha" type="password" class="validate" id="senha">
        <label for="password">Senha</label>
      </div>
    </div>
    <div class="">
      <div class="input-field">
        <input name="confirmeSenha"  type="password" class="validate" id="confsenha">
        <label for="password">Confirme sua Senha</label>
     </div>
     </div>
       <button type="submit" >Confirmar</button><br>
       <a href="login.php" style="text-decoration:none">
        Faça seu Loguin
       </a>
    </div>
   </form>
 </div>
</main>

<script src="<?=$BASE_URL?>js/script.js"></script>
<script src="<?=$BASE_URL?>js/loguin.js"></script>
<script src="<?=$BASE_URL?>js/cadastro.js"></script>