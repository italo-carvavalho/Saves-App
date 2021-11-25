<?php 
require_once("templates/header.php");
require_once("Dao/WorkerDao.php");

$wokerDao = new WorkerDao($conn,$BASE_URL);

$workerData = $workerDao->verifyToken(true);

?>

<main class="container">
	
	<!--	<h1>Faça parte do SAVESAPP</h1>
  		<h2 id="home-text-1">Encontre os melhores <br> profissionais</h2>
  			<img id="home-image-1" src="images/girl-work-on-laptop.png" alt="girl">
  			<img id="home-image-2" src="images/business-deal.png" alt="handshake">
  		<h2 id="home-text-2">Encontre empregos facilmente</h2> --> 

          <h1>PROFISSIONAL DO PROFISSIONAL</h1>
  	</main>


<?php 
require_once("templates/footer.php");
?>