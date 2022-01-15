<?php 

require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$fk_id_user = intval($_GET['id']);


$sql = "DELETE FROM schedule WHERE fk_id_user = :fk_id_user";
$stmt= $conn->prepare($sql);
$stmt->bindParam(":fk_id_user",$fk_id_user);
$stmt->execute();

$message->setMessage("Agendamento excluído","success","back");
