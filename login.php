<?php  
require_once("templates/header.php");

// require_once("vendor/autoload.php");
// use App\Model\UserDao;
// $ob = new UserDao();
// echo $ob->u;
?>

  <main class="container">
   <h2>Login</h2>
    <form action="">
        <div class="input-field">
            <input type="text" name="Usuario" id="Usuario" placeholder="Entre com seu Apelido">
            <div class="undeline">    
            </div>
        </div>

        <div class="input-field">
            <input type="password" name="Senha" id="Senha" placeholder="Entre com sua Senha">
            <div class="undeline"></div>
        </div>

        <input type="submit" value="Continuar">
    </form>

    <div class="footer">
        <div>
            <a href="cadastrocli.php" style="text-decoration:none">
                Cadastro do Cliente
            </a>
        </div>
        <div class="footer">
        <div>
            <a href="cadastropro.php" style="text-decoration:none">
                Cadastro do Profissional 
        </a>
        </div>
        <span>Ou Conecte Com sua Conta Social</span>      
        <div class="social-fields">
            <div class="social-fieldd facebook" >
                <a href="#" style="text-decoration:none">
                    <i class="fab fa-facebook-f"></i>
                    Entre com o Facebook
                </a>
            </div>
                <div class="social-fieldd google">
                    <a href="#" style="text-decoration:none" >
                        <i class="fab fa-google"></i>
                        Entre com o Google
                    </a>
                </div>
        </div>
    </div>             
    </main>

<?php require_once("templates/footer.php")  ?>

   
