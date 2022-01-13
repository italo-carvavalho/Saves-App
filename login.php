<?php  
require_once("templates/header.php");



?>

  <main class="container">
  <div >    
      <form action="process_login.php" method="POST">    
            <h2>Login</h2>
            
        <div>
           <input required  id="email" type="email" class="validate" name="email" id="user">
        </div>
        <div>
           <input required type="password" class="validate" id="password" name="password">
        </div>   
         
        </div>    

       <!-- <div>
        <input required type="radio" name="radio" value="cliente"/><span style="font-size:12px"> Cliente</span><br />
        <input type="radio" name="radio" value="profissional"/><span style="font-size:12px"> Profissional</span><br />
        </div> -->

        <button type="submit" >Confirmar</button>
       </form>
     </div>
    <div class="z">
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
    </main>

<?php require_once("templates/footer.php") ?>

   
