<?php

require_once("conexao.php");
require_once("globals.php");
require_once("Model/Message.php");



$message = new Message($BASE_URL);



//if($_POST['radio'] == "cliente"){
  
    $dados = $_POST;

	$email = $dados['email'];
	$password = $dados['password'];

    if($email && $password){

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
           
            //$_SESSION['cliente_logado'] = true;
            $_SESSION['id_user'] =  $result['id_user'];
            header("Location: index.php");
            $message->setMessage("Bem Vindo!","success","");
        }else{
            
            $message->setMessage("Email e/ou senha incorretos","error","back");

        }
        

    }else{
       
        $message->setMessage("Por favor preencha todos os campos","error","back");

    }
//}
/*elseif($_POST['radio'] == "profissional")
{
    $dados = $_POST;

	$email = $dados['email'];
	$password = $dados['password'];

    if($email && $password){

        $sql = "SELECT * FROM worker WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            
            $_SESSION['profissional_logado'] = true;
            $_SESSION['name'] =  $result['name'];
            $_SESSION['id_work'] = $result['id_work'];
            header("Location: index.php");
            $message->setMessage("Bem Vindo!","success","");
        }else{
            
            $message->setMessage("Email e/ou senha incorretos","error","back");

        }
        

    }else{
       
        $message->setMessage("Por favor preencha todos os campos","error","back");

    }
} */






