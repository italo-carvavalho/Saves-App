<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$fk_id_profesion =  $_SESSION['id_profession'];

$situation = "Em andamento";

$id = $_GET['id'];

try{
	$sql = "UPDATE schedule SET situation = :situation WHERE fk_id_profesion = :fk_id_profession";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":situation",$situation);
    $stmt->bindParam(":fk_id_profession",$);
	$stmt->execute();
	$message->setMessage("Solicitação aceita","back");

	}catch(Exception $e){
		echo $e->getMessage();
}
	
?>