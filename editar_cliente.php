<?php 
require_once("templates/header.php");
require_once("Dao/ClienteDao.php");

$clienteDao = new ClienteDao($conn,$BASE_URL);

$clienteData = $clienteDao->verifyToken(true);

?>

<main class="container">
	



	

          <h1>CLIENTE LOGADO</h1>
  	</main>


<?php require_once("templates/footer.php");?>