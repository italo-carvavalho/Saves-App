<?php require_once("templates/header.php")?>



<main class="container">
<h2>Cadastro do Profissional</h2>
  <form action="auth_proccess.php" method="POST">
      <input type="hidden" name="type" value="register_worker">
      <div class="input-field">
          <input type="text" name="name" id="nome" placeholder="Nome Completo">
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
       </div>
       <div class="input-field">
          <label for="cidade">Escolha a sua Cidade:</label>
          <select name="cidade" id="cidade">
              <option value="cidade"> --- </option>
              <option value="Abreu e Lima">Abreu e Lima</option>
              <option value="Igarassu">Igarassu</option>
              <option value="Paulista">Paulista</option>
              <option value="Itamaraca">Itamaraca</option>
              <option value="Recife">Recife</option>
              </select>
          <div class="undeline"></div>
        </div>
        <div class="input-field">
           <label for="profissao">Escolha a sua Profissão:</label>
           <select name="service" id="profissao">
               <option value="profissao"> --- </option>
               <option value="Mecanico">Mecanico</option>
               <option value="eletrecista">eletrecista</option>
               <option value="Geceiro">Geceiro</option>
               <option value="Pintor">Pintor</option>
               <option value="Pedreiro">Pedreiro</option>
               </select>
           <div class="undeline"></div>
        </div>

        <div class="input-field">
          
<textarea cols="40"rows="5"id="message"name="description"placeholder="Descrição.."></textarea> 
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
    <div>
        <a href="login.php" style="text-decoration:none">
            Faça seu Loguin
        </a>
    </div>
   </div>
</main>

<?php 
// require_once("templates/footer.php")
?> 