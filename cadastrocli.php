<?php require_once("templates/header.php")?>



<main class="container">

    <div class="row">
        <form class="col s6" action="auth_proccess.php" method="post">
    <fieldset>
        <h4>Cadastro do Cliente</h4>
      <div class="row">
        <div class="input-field col s12">
          <input  id="full_name" type="text" class="validate" id="name">
          <label for="full_name">Nome Completo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="password" class="validate" id="senha">
          <label for="password">Senha</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  type="password" class="validate" id="confsenha">
          <label for="password">Confirme sua Senha</label>
       </div>
      </div>
      <div class="row">
       <div class="input-field col s12">
          <input id="icon_telephone" type="tel" class="validate" id="telefone">
          <label for="icon_telephone">Telefone</label>
        </div>
      </div>    
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" id="email"> 
          <label for="email">E-mail</label>
        </div>
       </div>
       <button type="submit" >Confirmar</button>
      </div>
     </fieldset>
    </form>
  </div>
  <!-- <form action="auth_proccess.php" method="post"> -->
  <!--  -->
      <!-- <input type="hidden" name="type" value="register_cliente"> -->
      <!-- <div class="campo"> -->
          <!-- <input type="text" name="name" id="name" placeholder="Nome Completo"> -->
          <!-- <div class="undeline">     -->
          <!-- </div> -->
      <!-- </div> -->
      <!-- <div class="input-field"> -->
          <!-- <input type="texto" name="email" id="email" placeholder="E-mail"> -->
          <!-- <div class="undeline"></div> -->
      <!-- </div> -->
      <!-- <div class="input-field"> -->
          <!-- <input type="texto" name="telefone" id="telefone" placeholder="Telefone"> -->
          <!-- <div class="undeline"></div> -->
     <!-- </div> -->
      <!-- <div class="input-field"> -->
          <!-- <input type="password" name="password" id="senha" placeholder="Senha com 8 caracteres"> -->
           <!-- <div class="undeline"></div> -->
      <!-- </div> -->
      <!-- <div class="input-field"> -->
           <!-- <input type="password" name="confirmPassword" id="confsenha" placeholder="Confirme sua senha"> -->
           <!-- <div class="undeline"></div> -->
      <!-- </div> -->
      <!-- <button type="submit" >Confirmar</button> -->
      <!-- <input type="submit" value="Confirmar"> -->
<!--       -->
   <!-- </form> -->
   <div class="footer">
    <div class="z">
        <a href="login.php" style="text-decoration:none">
            Faça seu Loguin
        </a>
    </div>
   </div>
</main>

<?php 
require_once("templates/footer.php")
?>
        