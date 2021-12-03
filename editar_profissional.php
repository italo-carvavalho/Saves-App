<?php 
require_once("templates/header.php");
require_once("Model/Worker.php");
require_once("Dao/WorkerDao.php");

$worker = new Worker();

$wokerDao = new WorkerDao($conn,$BASE_URL);

$workerData = $workerDao->verifyToken(true);
 


$fullName = $worker->getFullName($workerData);

if($workerData->image == ''){
	$workerData->image = "user.png";
}

if($workerData->cidade == ''){
	$cidade = '';
}else{
	$cidade = $workerData->cidade;
}
if($workerData->service == ''){
	$service = '';
}else{
	$service = $workerData->service;
}

?>

<main class="container">

  
		  
<div>
	<img class="profile-image-container" src="<?=$BASE_URL?>images/<?= $workerData->image ?>" alt="">
</div>
	    <h2><?= $fullName ?></h2>

		<p class="page-description">Complete Seu Cadastro</p>

	    <form action="<?= $BASE_URL ?>prof_process.php" method="post" enctype="multipart/form-data">
		

	       <input type="hidden" name="type" value="update">	
		   <div class="input-field">
			   <label for="name">Nome:</label>
			   <input type="text" name="name" id="name" value="<?= $workerData->name ?>">
		   </div>
		   <div class="input-field">
			   <label for="email">E-mail:</label>
			   <input style="background-color: #ccc;" readonly type="text" name="email" id="email" value="<?= $workerData->email ?>">
		   </div>
		   <div class="input-field">
			   <label for="telefone">Telefone</label>
			<input readonly type="text" name="telefone" id="telefone" value="<?= $workerData->telefone ?>">
		   </div>
		   <div class="input-field">
		   <label for="cidade">Escolha a sua Cidade:</label>
			<select name="cidade" id="cidade">
				<option><?= $cidade ?></option>
				<option value="Abreu e Lima">Abreu e Lima</option>
				<option value="Igarassu">Igarassu</option>
				<option value="Paulista">Paulista</option>
				<option value="Itamaraca">Itamaraca</option>
				<option value="Recife">Recife</option>
				</select>
		   </div>
		   <div class="form-wraper w50">
				<label for="profissao">Escolha a sua Profissão:</label>
				<select name="service" id="profissao">
					<option><?= $service ?></option>
					<option value="Mecanico">Mecanico</option>
					<option value="eletrecista">eletrecista</option>
					<option value="Geceiro">Geceiro</option>
					<option value="Pintor">Pintor</option>
					<option value="Pedreiro">Pedreiro</option>
					</select>
		   </div>
		   <div class="form-wraper w100">
			  <textarea cols="40"rows="5" id="message"name="descricao" placeholder="Descreva seu trabalho"><?php echo $workerData->description ?></textarea> 
        </div>
		   </div>
           <div>
			   <label for="image">Foto</label>
			   <input type="file" name="image" id="" class="form-control-file">
		   </div>

		   <input type="submit" class="btn form-btn" value="Alterar">
	    </form>
   

         </main>




<?php 
require_once("templates/footer.php");
?>