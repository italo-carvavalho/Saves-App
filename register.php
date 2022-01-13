<?php require_once("templates/header.php")?>


<main class="container">


<div class="row">
    <form class="col s6" action="professional_process.php" method="POST">
      <input type="hidden" name="type" value="register_professional">
    <fieldset>
        <h4>Cadastro do usuário</h4>
      <div class="">
        <div class="input-field col s12">
          <input name="name"  id="full_name" type="text" class="validate" id="name">
          <label for="full_name">Nome Completo</label>
        </div>
      </div>
      <div class="">
       <div class="input-field col s12">
          <input name="phone" id="icon_telephone" type="phone" class="validate" id="phone">
          <label for="icon_phone">Telefone</label>
        </div>
      </div>    
      <div class="">
        <div class="input-field col s12">
          <input type="email" id="email" name="email" class="validate"> 
          <label for="email">E-mail</label>
        </div>
       </div>
       <div class="">
      <div class="input-field col s12">
        <input  name="password" type="password" class="validate" id="password">
        <label for="password">Senha</label>
      </div>
    </div>
    <div class="">
      <div class="input-field col s12">
        <input name="confirmpassword"  type="password" class="validate" id="confpassword">
        <label for="password">Confirme sua Senha</label>
     </div>
    </div>

    <div class="">
      <div class="input-field col s12">
      <input type="radio" id="" name="type_user" value="0">
        <label for="">Cliente</label>
     </div>
    </div>

    <div class="">
      <div class="input-field col s12">
      <input type="radio" id="" name="type_user" value="1">
        <label for="">Profissional</label>
     </div>
    </div>

       <button type="submit" >Confirmar</button>
      </div>
     </fieldset>
    </form>
  </div>
     
   <div class="z">
    
        <a href="login.php" style="text-decoration:none">
            Faça seu Loguin
        </a>
    
   </div>
</main>

<?php require_once("templates/footer.php")?> 