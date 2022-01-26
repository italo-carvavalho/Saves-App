<?php 
require_once("globals.php");
require_once("connection.php");
require_once("Model/Message.php");



$message = new Message($BASE_URL);

$posts = $message->getMessage();

if(!empty($posts['msg'])){
    //limpar a menssagem
    $message->clearMessage();
}


$name = '';
$email = '';
$phone = '';
if($_SESSION['professional_logged']){
//	$id= $_SESSION['id_work'];
	$id = 41;
    //die;
	$sql = "SELECT * FROM users WHERE id_work = '{$id}'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $result = $stmt->fetch();
    $name =  $result['name'];
	$email =$result['email'];
	$phone = $result['phone'];
	
}else{
	header('Location: index.php');
}



require_once("templates/header.php");
?>

			
	<div>
		<img class="profile-image-container" src=" " alt="">
	</div>
	
	<div class="container-prof">
		<h2>Perfil do Profissional</h2>
		<p>Complete suas informações</p>
	</div>

   

	    <form action="<?= $BASE_URL ?>professional_process.php" method="post" enctype="multipart/form-data">
		
      
	       <input type="hidden" name="type" value="update">	
		   <div class="input-field">
			   <label for="name">Nome:</label>
			   <input type="text" name="name" id="name" value="<?= $name ?>">
		   </div>
		   <div>
			   <label for="email">E-mail:</label>
			   <input style="background-color: #ccc;" readonly type="text" name="email" id="email" value="<?= $email ?>">
		   </div>
		   <div class="input-field">
			   <label for="phone">Telefone</label>
			   <input readonly type="text" name="phone" id="phone" value="<?= $phone ?>">
		   </div>
			<div class="input-field">
				<label for="city">Escolha a sua Cidade:</label>
				<select name="city" id="city">
					<option></option>
					<option value="Abreu e Lima">Abreu e Lima</option>
					<option value="Igarassu">Igarassu</option>
					<option value="Paulista">Paulista</option>
					<option value="Itamaraca">Itamaraca</option>
					<option value="Recife">Recife</option>
					</select>
			</div>
			<div class="form-wraper w50">
				<label for="profession">Escolha a sua Profissão:</label>
					<select name="services" id="profession">
					<option></option>
					<option value="Mecanico">Mecanico</option>
					<option value="eletrecista">eletrecista</option>
					<option value="Geceiro">Geceiro</option>
					<option value="Pintor">Pintor</option>
					<option value="Pedreiro">Pedreiro</option>
				</select>
		   </div>
		   <div class="form-wraper w100">
			  <textarea cols="40"rows="5" id="message"name="description" placeholder="Descreva seu trabalho"></textarea> 
        </div>
		   </div>
           <div>
			   <label for="image">Foto</label>
			   <input type="file" name="image" id="" class="form-control-file">
		   </div>

		   <input type="submit" class="btn form-btn" value="edit">
		
	    </form>
   

        <!-- </main> -->




<?php require_once("templates/footer.php");


?>