<?php 

require_once("globals.php");
require_once("connection.php");
require_once("Model/Message.php");



$message = new Message($BASE_URL);

$posts = $message->getMessage();

if(!empty($posts['msg'])){
    //limpar a menssagem
    $message->clearMessage();
}
/*
$id_client = $_SESSION['id_client'];
*/
$id_profession = $_SESSION['id_profession'];
if(isset($id_client)){
    $stmt = $conn->query("SELECT id_client, name FROM client WHERE id_client = '{$id_client}'");
    $user_client = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  
}elseif(isset($id_profession)){
    $stmt = $conn->query("SELECT id_profession, name FROM profession WHERE id_profession = '{$id_profession}'");
    $user_prof = $stmt->fetch(PDO::FETCH_ASSOC);
    $name_profession = $user_prof['name'];


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
            <?php if(isset($id_client)){  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>client_schedule.php">Meus Agendamentos</a>
                <a class="nav-btn" href="<?=$BASE_URL?>schedule.php">Agendar</a>
                <a class="nav-btn" href="<?=$BASE_URL?>perfil_client.php"><?= $name_client['name']; ?></a>
                <a class="nav-btn" href="<?=$BASE_URL?>logout.php">Sair</a>
               <!-- <a href="//$BASE_URLperfil_pro.php"> <img class="guest" type="image/svg+xml" src="//$BASE_URLimages/user.svg"> </a> -->
            <?php }elseif(isset($id_profession)){  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>professional_schedule.php">Solicitações</a>
                <a class="nav-btn" href="<?=$BASE_URL?>cadastrar_servico.php">Serviços</a>
                <a class="nav-btn" href="<?=$BASE_URL?>perfil_professional.php"><?php echo $name_profession; ?></a>
                <a class="nav-btn" href="<?=$BASE_URL?>logout.php">Sair</a>
            <?php }else{  ?>
                <a class="nav-btn" href="<?=$BASE_URL?>#" id="register">Cadastro</a>
                <a class="nav-btn" href="<?=$BASE_URL?>#" id="login">Entrar</a>
            <?php } ?>
        </nav>

        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
     </header>  
</body>
    <?php  if(!empty($posts['msg'])){  ?>
            <div class="msg-container">
                <p class="msg <?= $posts['type'] ?>"><?= $posts['msg'] ?></p>
           </div>
    <?php  }  ?>
    
<!-- modal tela de loguin -->
<div id="log" class="modal">

  <div class="modal-content-log"> 
    
    <h2 class="c-log">Login</h2>
    
    <span class="logclose">&times;</span>    
    <form action="process_login.php" method="POST"> 
     
    <div class="input-field">
    <label for="email">E-mail:</label>
        <input required  id="email" type="email" class="validate" name="email" style="width: 15em">
    </div></br>
    
    <div class="input-field">
    <label for="password">Senha:</label>
        <input required type="password" class="validate" id="password" name="password" style="width: 15em">
    </div>
  </br>   
 <!-- <div class="input-field">
      <input required type="radio" name="radio" value="cliente"/>Cliente
  </div>
  <div class="input-field">
      <input type="radio" name="radio" value="profissional"/>Profissional
  </div> -->
  </br>
    <button type="submit" class="button-log">Confirmar</button>

  </form>
  </br>
    <!-- <div>
        <a href="cadastro.php" style="text-decoration:none;font-size: large">
            Cadastro
        </a>
  </div> -->
    <span>Ou se Conecte Com sua conta</span>      
    <div class="social-fields">
      <div class="social-field facebook" >
          <a href="#" style="text-decoration:none;">
              <i class="fab fa-facebook-f"></i>
                Entre com o Facebook
          </a>
   </div>
  </br>
      <div class="social-field google">
          <a href="#" style="text-decoration:none;" >
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
    <form  action="users_process.php" method="POST">
      <input type="hidden" name="type" value="register_professional">
        <div class="input-field">
        <label for="name">Nome Completo:</label>
        <input name="name"  type="text" class="validate" id="name" style="width: 20em">
        </div>  
      
        <div class="input-field">
        <label for="phone">Telefone:</label>
        <input name="phone"  type="phone" class="validate" id="phone"style="width: 15em">
        </div>          
     
        <div class="input-field">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" class="validate" style="width: 20em"> 
        </div>     
        
        <div class="input-field">
        <label for="city">Cidade</label>
        <select name="city" id="">
                <option disabled selected value="">Qual cidade você mora?</option>
                <option value="Igarassu">Igarassu</option>
                <option value="Itapissuma">Itapissuma</option>
                <option value="Itamaraca">Itamaracá</option>
                <option value="Abreu e Lima">Abreu e Lima</option>
                <option value="Paulista">Paulista</option>
             </select>
        </div>  
       
        <div class="input-field">
        <label for="password">Senha:</label>
        <input  name="password" type="password" class="validate" id="password" style="width: 13em">
        </div>    
    
        <div class="input-field">
        <label for="password">Confirmar Senha:</label>
        <input name="confirmPassword"  type="password" class="validate" id="confpassword" style="width: 13em">
        </div>
        <br>
        
        <div class="input-field">
        <input type="radio" id="" name="type_user" value="2"> Cliente
        </div>
        <div class="input-field">
        <input type="radio" id="" name="type_user" value="1"> Profissional
        </div>
        
        
        <button type="submit" class="button-cad">Confirmar</button><br>
        <!-- <a href="login.php" style="text-decoration:none">
        Faça seu Loguin
        </a> -->
    </div>
   </form>
 </div>


<script src="<?=$BASE_URL?>js/script.js"></script>
<script src="<?=$BASE_URL?>js/login.js"></script>
<script src="<?=$BASE_URL?>js/register.js"></script>