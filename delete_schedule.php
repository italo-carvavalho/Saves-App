<?php 

 $id_schedule =  $_GET['id'];


require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);




$sql = "DELETE FROM schedule WHERE id_schedule = :id_schedule";
$stmt= $conn->prepare($sql);
$stmt->bindParam(":id_schedule",$id_schedule);
$stmt->execute();

$message->setMessage("Agendamento excluído","success","back");
