<?php require_once("templates/header.php")?>



<main class="container">
<h2>Cadastro do Profissional</h2>
  <form action="">
      <div class="input-field">
          <input type="text" name="nome" id="nome" placeholder="Nome Completo">
          <div class="undeline">    
          </div>
      </div>
      <div class="input-field">
          <input type="texto" name="e-mail" id="email" placeholder="E-mail">
          <div class="undeline"></div>
      </div>
      <div class="input-field">
          <input type="texto" name="telefone" id="telefone" placeholder="Telefone">
          <div class="undeline"></div>
        </div> 
       <div class="input-field">
          <input type="texto" name="cidade" id="cidade" placeholder="Cidade">
        <div class="undeline"></div>
       </div>
       <div class="input-field">
          <label for="cidade">Escolha a sua Cidade:</label>
          <select name="cidade" id="cidade">
              <option value="Abreu e Lima"></option>
              <option value="Igarassu"></option>
              <option value=""></option>
              <option value=""></option>
              <option value=""></option>
              </select>
          <div class="undeline"></div>
      </div>
      <div class="input-field">
          <input type="password" name="senha" id="senha" placeholder="Senha com 8 caracteres">
           <div class="undeline"></div>
      </div>
      <div class="input-field">
           <input type="password" name="confirmasenha" id="confsenha" placeholder="Confirme sua senha">
           <div class="undeline"></div>
      </div>
      <input type="submit" value="Confirmar">
    
   </form>
   <div class="footer">
    <div>
        <a href="login.php" style="text-decoration:none">
            Faça seu Loguin
        </a>
    </div>
   </div>
</main>

<?php require_once("templates/footer.php")?>