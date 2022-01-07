<?php 

//require_once("templates/header.php");
session_start(); // Pega a sessão que já foi iniciada
//session_destroy();

if(isset($_SESSION['id_user'])){
    session_destroy();
    header("Location: index.php");
}



