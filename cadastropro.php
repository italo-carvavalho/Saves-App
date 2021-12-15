<?php require_once("templates/header.php")?>



<main class="container">

<div class="row">
    <form class="col s6" action="profissional_process.php" method="POST">
      <input type="hidden" name="type" value="cadastrar_profissional">
    <fieldset>
        <h4>Cadastro do Profissional</h4>
      <div class="">
        <div class="input-field col s12">
          <input name="nome"  id="full_name" type="text" class="validate" id="name">
          <label for="full_name">Nome Completo</label>
        </div>
      </div>
      <div class="">
       <div class="input-field col s12">
          <input name="telefone" id="icon_telephone" type="text" class="validate" id="telefone">
          <label for="icon_telephone">Telefone</label>
        </div>
      </div>    
      <div class="">
        <div class="input-field col s12">
          <input type="email" id="email" name="email" class="validate" id="email"> 
          <label for="email">E-mail</label>
        </div>
       </div>
       <div class="">
      <div class="input-field col s12">
        <input  name="senha" type="password" class="validate" id="senha">
        <label for="password">Senha</label>
      </div>
    </div>
    <div class="">
      <div class="input-field col s12">
        <input name="confirmeSenha"  type="password" class="validate" id="confsenha">
        <label for="password">Confirme sua Senha</label>
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