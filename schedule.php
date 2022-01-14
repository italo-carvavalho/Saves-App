<?php
require_once("templates/header.php");
?>

<?php

$stmt = $conn->query("SELECT users.name, services.name_services FROM services INNER JOIN users WHERE users.id_user = services.fk_id_user");
$services = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<h1>Agendar um serviço</h1>
<form action="register_schedule">
    <?php  foreach($services as $value):echo "$value <br> ";?>
    <?php endforeach;?>
    <input type="hidden" name="type" value="register_schedule">
    <input type="hidden" name="solicitation" value="0">
<button class="schedule_button" type="submit">Enviar Solicitação</button><br>
</form>
    
       
</table>

<?php  foreach($services as $cervice): ?>

<?php endforeach;  ?>



<?php
require_once("templates/footer.php");
?>