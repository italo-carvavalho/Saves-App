<?php 

require_once("conexao.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("Model/Worker.php");
require_once("Dao/WorkerDao.php");

$message = new Message($BASE_URL);

$workerDao = new WorkerDao($conn,$BASE_URL);

//resgata o tipo de formulario
$type = filter_input(INPUT_POST,"type");

//atualizar usuario
if($type == "update"){
  
    //resgata dados do usuario
    $workerData = $workerDao->verifyToken();

    //recebe dados do post
    $name = filter_input(INPUT_POST,"name");
	$email = filter_input(INPUT_POST,"email");
	$telefone = filter_input(INPUT_POST,"telefone");
	$service = filter_input(INPUT_POST,"service");
	$cidade = filter_input(INPUT_POST,"cidade");
	$description = filter_input(INPUT_POST,"descritpion"); 
	$image = filter_input(INPUT_POST,"image"); 
  /*	$password = filter_input(INPUT_POST,"password");
	$confirmPassword = filter_input(INPUT_POST,"confirmPassword"); */

    //criar um novo objeto de usuario
    $worker = new Worker();

    //preenchar os dados do usuario
    $workerData->name = $name;
    $workerData->email = $email;
    $workerData->telefone = $telefone;
    $workerData->service = $service;
    $workerData->cidade = $cidade;
    $workerData->description = $description;
    //$worker->image = $image; 

    $workerDao->update($workerData);

}else{

    $message->setMessage("Informações inválidas!","error","back");
}