<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

/*
$fk_id_profession =  $_GET['id'];

$sql = "DELETE FROM services WHERE fk_id_profession = :fk_id_profession";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":fk_id_profession",$fk_id_profession);
$stmt->execute();

$message->setMessage("Serviço excluído com sucesso","success","back");
?>

*/