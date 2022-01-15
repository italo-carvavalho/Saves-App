<?php

require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");



$message = new Message($BASE_URL);



//if($_POST['radio'] == "cliente"){
  
    $data = $_POST;

	$email = $data['email'];
	$password = $data['password'];

    if($email && $password){

        $sql = "SELECT email FROM client WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result_client = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT email FROM profession WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result_prof = $stmt->fetch(PDO::FETCH_ASSOC);

        if($email == $result_client['email'])
        {
            $sql = "SELECT * FROM client WHERE email = :email AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $result_client = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($result_client)){
               
                //$_SESSION['cliente_logado'] = true;
                $_SESSION['id_client'] =  $result_client['id_client'];
                header("Location: index.php");
                $message->setMessage("Bem Vindo!","success","");
            }else{
                
                $message->setMessage("Email e/ou senha incorretos","error","back");
    
            }
        }
        elseif($email == $result_prof['email'])
        {
            $sql = "SELECT * FROM profession WHERE email = :email AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $result_prof = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($result_prof)){
               
                //$_SESSION['cliente_logado'] = true;
                $_SESSION['id_profession'] =  $result_prof['id_profession'];
                header("Location: index.php");
                $message->setMessage("Bem Vindo!","success","");
            }else{
                
                $message->setMessage("Email e/ou senha incorretos","error","back");
    
            }
        }
    }



       






