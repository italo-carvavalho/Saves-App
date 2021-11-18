<?php 


require_once("conexao.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("Model/User.php");
require_once("Dao/UserDao.php");



$message = new Message($BASE_URL);

$userDao = new userDao($conn,$BASE_URL);


//resgata o tipo de formulario
$type = filter_input(INPUT_POST,"type");


//verifica o tipo do formulario
if($type == "register"){

	$name = filter_input(INPUT_POST,"name");
	$email = filter_input(INPUT_POST,"email");
	$phone = filter_input(INPUT_POST,"phone");
	$password = filter_input(INPUT_POST,"password");
	$confirmPassword = filter_input(INPUT_POST,"confirmPassword");

	//verificação de dados minimos
	if($name && $email && $phone && $password && $confirmPassword){
		
		//verificar se as senhas batem
		if($password === $confirmPassword){

			//verificar se o email já esta cadastrado
			if($userDao->buscarPorEmail($email) === false){
				
				$user = new User();

                //criação de token e senha
                $userToken = $user->gerarToken();
                $finalPassword =$user->gerarSenha($password);

                //montar o objeto
                $user->name =$name;
                $user->email=$email;
                $user->phone =$phone;
                $user->password =$finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->criar($user,$auth);

			}else{
				//menssagem de erro usuario já existe
			   $message->setMessage("Usuário já cadastrado tente outro e-mail","error","back");
			}

		}else{
			//menssagem de erro de senhas não batem
			$message->setMessage("As senhas não correspondem","error","back");
		}


	}else{
		//enviar menssagem de erro de dados faltantes
		$message->setMessage("Por favor preencha todos os campos","error","back");
	}

}else if($type == "login"){

}




