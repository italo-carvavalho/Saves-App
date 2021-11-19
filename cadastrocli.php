<?php require_once("templates/header.php")?>



<main class="container">



<h2>Cadastro do Cliente</h2>
  <form action="auth_proccess.php" method="post">
      <input type="hidden" name="type" value="register">
      <div class="input-field">
          <input type="text" name="name" id="name" placeholder="Nome Completo">
          <div class="undeline">    
          </div>
      </div>
      <div class="input-field">
          <input type="texto" name="email" id="email" placeholder="E-mail">
          <div class="undeline"></div>
      </div>
      <div class="input-field">
          <input type="texto" name="telefone" id="telefone" placeholder="Telefone">
          <div class="undeline"></div>
     </div>
      <div class="input-field">
          <input type="password" name="password" id="senha" placeholder="Senha com 8 caracteres">
           <div class="undeline"></div>
      </div>
      <div class="input-field">
           <input type="password" name="confirmPassword" id="confsenha" placeholder="Confirme sua senha">
           <div class="undeline"></div>
      </div>
      <input type="submit" value="Confirmar">
    
   </form>
   <div class="footer">
    <div class="z">
        <a href="login.php" style="text-decoration:none">
            Faça seu Loguin
        </a>
    </div>
   </div>
</main>

<?php 
// require_once("templates/footer.php")
?>