<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

if (isset($_SESSION['id_client'])) {

$fk_id_client = $_SESSION['id_client'];
}

if (isset($_SESSION['id_profession'])) {

$fk_id_profession = $_SESSION['id_profession'];

}

$id_schedule = $_GET['id'];

if(isset($fk_id_client)){

$situation = "Concluído";

try{
	$sql = "UPDATE schedule SET situation = :situation WHERE id_schedule = :id_schedule";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":situation",$situation);
    $stmt->bindParam(":id_schedule",$id_schedule);
	$stmt->execute();
	$message->setMessage("Serviço conluído com sucesso","success","back");

	}catch(Exception $e){
		echo $e->getMessage();
}

}elseif (isset($fk_id_profession)) {
	
$situation = "Em andamento";

try{
	$sql = "UPDATE schedule SET situation = :situation WHERE id_schedule = :id_schedule";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":situation",$situation);
    $stmt->bindParam(":id_schedule",$id_schedule);
	$stmt->execute();
	$message->setMessage("Solicitação aceita", "success","back");

	}catch(Exception $e){
		echo $e->getMessage();
}
}
?>