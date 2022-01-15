<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$situation = "Em andamento";

$fk_id_user = $_GET['id'];

try{
	$sql = "UPDATE schedule SET situation = :situation WHERE fk_id_user = :fk_id_user";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":situation",$situation);
    $stmt->bindParam(":fk_id_user",$fk_id_user);
	$stmt->execute();
	$message->setMessage("Solicitação aceita","back");

	}catch(Exception $e){
		echo $e->getMessage();
}
	
?>