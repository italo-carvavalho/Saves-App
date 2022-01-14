<?php
require_once("templates/header.php");
?>

<?php

$stmt = $conn->query("SELECT users.name, services.name_services FROM services INNER JOIN users WHERE services.fk_id_user = users.id_user");
$services = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<h1>Agendar um serviço</h1>
<form action="register_schedule.php" method="POST">
    <?php  foreach($services as $value):echo "$value <br> ";?>
    <?php endforeach;?>
    <input type="hidden" name="type" value="schedule_solicitation">
<button class="schedule_button" type="submit">Enviar Solicitação</button><br>
</form>
    
       
</table>

<?php  foreach($services as $cervice): ?>

<?php endforeach;  ?>



<?php
require_once("templates/footer.php");
?>