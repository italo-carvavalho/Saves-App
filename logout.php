<?php 

//require_once("templates/header.php");
session_start(); // Pega a sessão que já foi iniciada
//session_destroy();

if(isset($_SESSION['id_client'])){
    session_destroy();
    header("Location: index.php");
}if(isset($_SESSION['id_profession'])){
    session_destroy();
    header("Location: index.php");
}



