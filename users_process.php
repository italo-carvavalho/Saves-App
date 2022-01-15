<?php 


require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);



if($_POST['type'] == "register_professional" &&  $_POST['type_user'] == "1"){

		

		$data = $_POST;

		$empty_input = false;
				// Retirar os espaços em branco
				$data = array_map('trim', $data);
				// Retirar os espaços em branco em torno da string
				if (in_array("", $data)) {

					$empty_input = true;
					$message->setMessage("Não permitido espaços em branco","error","back");
				// Validar se o email digitado pelo usuário contém estrutura de email "user@user.com"
				} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
					$empty_input = true;
					$message->setMessage("Formato de email inválido","error","back");
				}else{
					$name = $data['name'];
					$phone = $data['phone'];
					$email = $data['email'];
					$password = $data['password'];
					//$type_user = $data['type_user'];
					$confirmPassword = $data['confirmPassword'];
					$city = $data['city'];


	if($name && $phone && $email && $password && $confirmPassword && $city){
			
			if($password == $confirmPassword){

			$stmt = $conn->prepare("SELECT * FROM profession WHERE email = :email");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$return = $stmt->rowCount();

			if($return > 0){
				//menssagem de erro usuario já existe
				$message->setMessage("Profisional já cadastrado tente outro e-mail","error","back");
			}else{
				//nenhum usuário encontrado 
				try{
				$sql = "INSERT INTO profession(name,email,phone,password,city) VALUES(:name,:email,:phone,:password,
				:city)";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(":name",$name);
						$stmt->bindParam(":email",$email);
						$stmt->bindParam(":phone",$phone);
						$stmt->bindParam(":password",$password);
						$stmt->bindParam(":city",$city);
					$stmt->execute();
					$message->setMessage("Profissional cadastrado com sucesso","success","back");
				

				}catch(Exception $e){
				echo $e->getMessage();
				}
			}   

			}else{
				//menssagem de erro de senhas não batem
				$message->setMessage("As senhas não correspondem","error","back");
			}

		}else{
			//enviar menssagem de erro de dados faltantes
			$message->setMessage("Por favor preencha todos os campos","error","back");
		}



	}
}elseif($_POST['type'] == "register_professional" &&  $_POST['type_user'] == 2){
   echo "cliente";
   die;

   $data = $_POST;

   $empty_input = false;
		   // Retirar os espaços em branco
		   $data = array_map('trim', $data);
		   // Retirar os espaços em branco em torno da string
		   if (in_array("", $data)) {

			   $empty_input = true;
			   $message->setMessage("Não permitido espaços em branco","error","back");
		   // Validar se o email digitado pelo usuário contém estrutura de email "user@user.com"
		   } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			   $empty_input = true;
			   $message->setMessage("Formato de email inválido","error","back");
		   }else{
			   $name = $data['name'];
			   $phone = $data['phone'];
			   $email = $data['email'];
			   $password = $data['password'];
			   $confirmPassword = $data['confirmPassword'];
			   $city = $data['city'];


if($name && $phone && $email && $password && $confirmPassword  && $city){
	   
	   if($password == $confirmPassword){

	   $stmt = $conn->prepare("SELECT * FROM client WHERE email = :email");
	   $stmt->bindParam(':email', $email);
	   $stmt->execute();
	   $return = $stmt->rowCount();

	   if($return > 0){
		   //menssagem de erro usuario já existe
		   $message->setMessage("Cliente já cadastrado tente outro e-mail","error","back");
	   }else{
		   //nenhum usuário encontrado 
		   try{
		   $sql = "INSERT INTO client(name,email,phone,password,city) VALUES(:name,:email,:phone,:password,
		   :city)";
			   $stmt = $conn->prepare($sql);
			   $stmt->bindParam(":name",$name);
				   $stmt->bindParam(":email",$email);
				   $stmt->bindParam(":phone",$phone);
				   $stmt->bindParam(":password",$password);
				   $stmt->bindParam(":city",$city);
			   $stmt->execute();
			   $message->setMessage("Cliente cadastrado com sucesso","success","back");
		   

		   }catch(Exception $e){
		   echo $e->getMessage();
		   }
	   }   

	   }else{
		   //menssagem de erro de senhas não batem
		   $message->setMessage("As senhas não correspondem","error","back");
	   }

   }else{
	   //enviar menssagem de erro de dados faltantes
	   $message->setMessage("Por favor preencha todos os campos","error","back");
   }



}
}
