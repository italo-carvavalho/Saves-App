<?php 
require_once("templates/header.php");
require_once("Dao/WorkerDao.php");

$wokerDao = new WorkerDao($conn,$BASE_URL);

$workerData = $workerDao->verifyToken(true);

?>

<main class="container">
	
<h1>Buscar Serviços</h1>


  	</main>


<?php 
require_once("templates/footer.php");
?>