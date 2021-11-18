<?php 
require_once("templates/header.php");
require_once("templates/footer.php");
?>

<main class="container">
	<?php  if(!empty($menssagens['msg'])){  ?>
  <div class="msg-container">
     <p class="msg <?= $menssagens['type'] ?>"><?= $menssagens['msg'] ?></p>
  </div>
  <?php  }  ?>



	<!--	<h1>Faça parte do SAVESAPP</h1>
  		<h2 id="home-text-1">Encontre os melhores <br> profissionais</h2>
  			<img id="home-image-1" src="images/girl-work-on-laptop.png" alt="girl">
  			<img id="home-image-2" src="images/business-deal.png" alt="handshake">
  		<h2 id="home-text-2">Encontre empregos facilmente</h2> --> 

          <h1>LOGADO</h1>
  	</main>