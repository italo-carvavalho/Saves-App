<?php 
require_once("templates/header.php");



$id =  $_SESSION['id_user'];
$stmt = $conn->query("SELECT * FROM users WHERE id_user = '{$id}'");
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $user['name'];
$phone = $user['phone'];
$email = $user['email'];



?>


<main class="container">

 <div class="container-client">
   <p>Nome: <?= $name ?></p>
   <p>E-mail: <?= $email ?></p>
   <p>Telefone: <?= $phone ?></p>
 </div>
  




</main>

<?php require_once("templates/footer.php")?> 