<?php 
require_once("templates/header.php");



$id =  $_SESSION['id_client'];
$stmt = $conn->query("SELECT * FROM client WHERE id_client = '{$id}'");
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $user['name'];
$phone = $user['phone'];
$email = $user['email'];



?>


<div class="grid">

<fieldset class="card">

 <div class="container-client">
   <p>Nome: </br> <?= $name ?></p>
   <p>E-mail: </br> <?= $email ?></p>
   <p>Telefone: </br> <?= $phone ?></p>
 </div>
 </fieldset>
</div>

<?php require_once("templates/footer.php")?> 