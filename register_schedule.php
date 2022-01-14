<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);
if($_POST['type'] == "schedule_solicitation"){

	$data = $_POST;

    $solicitation = $data['solicitation'];

try{
	$sql = "INSERT INTO schedule(solicitation) VALUES(:solicitation)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":solicitation",$solicitation);
	$stmt->execute();
	$message->setMessage("Solicitação enviada","back");

	}catch(Exception $e){
		echo $e->getMessage();
}
}	
?>