<?php 


require_once("conexao.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("Model/User.php");
require_once("Dao/ClienteDao.php");
require_once("Dao/WorkerDao.php");



$message = new Message($BASE_URL);

$userDao = new ClienteDao($conn,$BASE_URL);

$workerDao = new WorkerDao($conn,$BASE_URL);


//resgata o tipo de formulario
$type = filter_input(INPUT_POST,"type");


//verifica o tipo do formulario
if($type == "register_cliente"){

	$name = filter_input(INPUT_POST,"name");
	$email = filter_input(INPUT_POST,"email");
	$telefone = filter_input(INPUT_POST,"telefone");
	$password = filter_input(INPUT_POST,"password");
	$confirmPassword = filter_input(INPUT_POST,"confirmPassword");

	//verificação de dados minimos
	if($name && $email && $telefone && $password && $confirmPassword){
		
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
                $user->telefone =$telefone;
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

}else if($type == "register_worker"){

/*	echo "<pre>";
	echo print_r($_POST);
	echo "</pre>";
	die;  */

	$name = filter_input(INPUT_POST,"name");
	$email = filter_input(INPUT_POST,"email");
	$telefone = filter_input(INPUT_POST,"telefone");
	$service = filter_input(INPUT_POST,"service");
	$cidade = filter_input(INPUT_POST,"cidade");
	$description = filter_input(INPUT_POST,"descritpion");
	$password = filter_input(INPUT_POST,"password");
	$confirmPassword = filter_input(INPUT_POST,"confirmPassword");

	//verificação de dados minimos
	if($name && $email && $password && $confirmPassword){
		
		//verificar se as senhas batem
		if($password === $confirmPassword){

			//verificar se o email já esta cadastrado
			if($workerDao->buscarPorEmail($email) === false){
				
				$user = new User();

                //criação de token e senha
                $workerToken = $user->gerarToken();
                $finalPassword =$user->gerarSenha($password);

                //montar o objeto
                $user->name =$name;
                $user->email=$email;
                $user->telefone =$telefone;
				$user->service = $service;
				$user->cidade = $cidade;
				$ser->description = $description;
                $user->password =$finalPassword;
                $user->token = $workerToken;

                $auth = true;

                $workerDao->criar($user,$auth);

			}else{
				//menssagem de erro usuario já existe
			   $message->setMessage("Profissional já cadastrado tente outro e-mail","error","back");
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

	

	$email = filter_input(INPUT_POST,"email");
	$password = filter_input(INPUT_POST,"password");

	
	//tenta autenticar o usuario 
	if($userDao->autenticarUsuario($email,$password)){

		//redireciona o usuario caso não conseguir autenticar
		$message->setMessage("Seja bem vindo!","success","editarperfil.php");

	}else{
		$message->setMessage("Usuário e/ou senha incorretos","error","back");
	}
}else{
	$message->setMessage("informações inválidas","error","index.php");
}







/* formularios */

/*
if($type == "register_worker"){
    
	echo $type;
     die;


	$name = filter_input(INPUT_POST,"name");
	$email = filter_input(INPUT_POST,"email");
	$telefone = filter_input(INPUT_POST,"telefone");
	$service = filter_input(INPUT_POST,"service");
	$cidade = filter_input(INPUT_POST,"cidade");
	$descripition = filter_input(INPUT_POST,"descritpion");
	$password = filter_input(INPUT_POST,"password");
	$confirmPassword = filter_input(INPUT_POST,"confirmPassword");

	//verificação de dados minimos
	if($name && $email && $telefone && $service && $cidade && $descripition && $password && $confirmPassword){
		
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
                $user->telefone =$telefone;
				$user->service = $service;
				$user->cidade = $cidade;
                $user->password =$finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->criar($user,$auth);

			}else{
				//menssagem de erro usuario já existe
			   $message->setMessage("Profissional já cadastrado tente outro e-mail","error","back");
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


	$email = filter_input(INPUT_POST,"email");
	$password = filter_input(INPUT_POST,"password");

	
	//tenta autenticar o usuario 
	if($userDao->autenticarUsuario($email,$password)){

		//redireciona o usuario caso não conseguir autenticar
		$message->setMessage("Seja bem vindo!","success","editarperfil.php");

	}else{
		$message->setMessage("Usuário e/ou senha incorretos","error","back");
	}

}else{
	$message->setMessage("informações inválidas novas","error","back");
}

*/