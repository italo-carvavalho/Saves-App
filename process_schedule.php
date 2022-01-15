<?php

require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);


 $situation = $_POST['situation'];
 $fk_id_user = $_POST['fk_id_user'];
 $fk_id_services = $_POST['fk_id_services'];


 //echo $situation." ".$fk_id_user." ".$fk_id_services;
 //die;




$sql = "INSERT INTO schedule(situation,fk_id_user,fk_id_services) 
		VALUES(:situacao,:fk_id_user,:fk_id_services)";
		$stmt = $conn->prepare($sql);
		//$stmt->bindParam(":date_hour",NOW());
		$stmt->bindParam(":situacao",$situation);
		$stmt->bindParam(":fk_id_user",$fk_id_user);
		$stmt->bindParam(":fk_id_services",$fk_id_services);

		$stmt->execute();
						
$message->setMessage("Serviço agendado com sucesso, o profissional ira confirmar o serviço","success","back");