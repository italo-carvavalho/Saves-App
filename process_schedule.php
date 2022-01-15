<?php

require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);


$fk_id_client =  $_SESSION['id_client'];


 $situation = $_POST['situation'];
 $fk_id_profession = $_POST['fk_id_profession'];
 $fk_id_services = $_POST['fk_id_services'];


$sql = "INSERT INTO schedule(situation,fk_id_client,fk_id_profession,fk_id_services) 
		VALUES(:situacao,:fk_id_client,:fk_id_profession,:fk_id_services)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":situacao",$situation);
		$stmt->bindParam(":fk_id_client",$fk_id_client);
		$stmt->bindParam(":fk_id_profession",$fk_id_profession);
		$stmt->bindParam(":fk_id_services",$fk_id_services);

		$stmt->execute();
						
$message->setMessage("Serviço agendado com sucesso, o profissional ira confirmar o serviço","success","back");