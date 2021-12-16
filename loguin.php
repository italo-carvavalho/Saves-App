<?php  
require_once("templates/header.php");


// require_once("vendor/autoload.php");
// use App\Model\UserDao;
// $ob = new UserDao();
// echo $ob->u;
?>

  <main class="container">
  <div class="row">    
      <form action="auth_proccess.php" method="POST">    
            <h2>Login</h2>
            
        <input type="hidden" name="type" value="login">
        <div>
           <input  id="email" type="text" class="validate" id="Usuario">
        </div>
        <div>
           <input type="password" class="validate" id="Senha">
        </div>   
         
        </div>    

        <div>
        <input type="radio" name="radio" value="cliente"/><span style="font-size:12px"> Cliente</span><br />
        <input type="radio" name="radio" value="profissional"/><span style="font-size:12px"> Profissional</span><br />
        </div>

        <button type="submit" >Confirmar</button>
       </form>
     </div>
    <div class="z">
        <div>
            <a href="cadastrocli.php" style="text-decoration:none;font-size: large">
                Cadastro do Cliente
            </a>
        </div>
        <div class="footer">
        <div>
            <a href="cadastropro.php" style="text-decoration:none;font-size: large">
                Cadastro do Profissional 
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

   
