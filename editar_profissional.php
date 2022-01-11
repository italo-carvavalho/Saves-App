<?php 
require_once("globals.php");
require_once("conexao.php");
require_once("Model/Message.php");



$message = new Message($BASE_URL);

$menssagens = $message->getMessage();

if(!empty($menssagens['msg'])){
    //limpar a menssagem
    $message->clearMessage();
}


$nome = '';
$email = '';
$telefone = '';
if($_SESSION['profissional_logado']){
//	$id= $_SESSION['id_work'];
	$id = 41;
    //die;
	$sql = "SELECT * FROM worker WHERE id_work = '{$id}'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $result = $stmt->fetch();
    $name =  $result['name'];
	$email =$result['email'];
	$telefone = $result['telefone'];
	
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

   

	    <form action="<?= $BASE_URL ?>prof_process.php" method="post" enctype="multipart/form-data">
		
      
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
			   <label for="telefone">Telefone</label>
			   <input readonly type="text" name="telefone" id="telefone" value="<?= $telefone ?>">
		   </div>
			<div class="input-field">
				<label for="cidade">Escolha a sua Cidade:</label>
				<select name="cidade" id="cidade">
					<option></option>
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
					<option></option>
					<option value="Mecanico">Mecanico</option>
					<option value="eletrecista">eletrecista</option>
					<option value="Geceiro">Geceiro</option>
					<option value="Pintor">Pintor</option>
					<option value="Pedreiro">Pedreiro</option>
				</select>
		   </div>
		   <div class="form-wraper w100">
			  <textarea cols="40"rows="5" id="message"name="descricao" placeholder="Descreva seu trabalho"></textarea> 
        </div>
		   </div>
           <div>
			   <label for="image">Foto</label>
			   <input type="file" name="image" id="" class="form-control-file">
		   </div>

		   <input type="submit" class="btn form-btn" value="Alterar">
		
	    </form>
   

        <!-- </main> -->




<?php require_once("templates/footer.php");


?>