<?php 
require_once("templates/header.php");



$id =  $_SESSION['id_user'];
$stmt = $conn->query("SELECT * FROM users WHERE id_user = '{$id}'");
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $user['name'];
$telefone = $user['telefone'];
$email = $user['email'];



?>


<main class="container">

 <div class="container-cliente">
   <p>Nome: <?= $nome ?></p>
   <p>E-mail: <?= $email ?></p>
   <p>Telefone: <?= $telefone ?></p>
 </div>
  




</main>

<?php require_once("templates/footer.php")?> 