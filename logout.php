<?php 

require_once("templates/header.php");

//se o usuario está logado
if($userDao){
   $userDao->destroiToken();
}