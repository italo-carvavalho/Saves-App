<?php
require_once("templates/header.php");
?>

<?php

$stmt = $conn->query("SELECT users.name, services.name_services FROM services INNER JOIN users WHERE users.id_user = services.fk_id_user");
$services = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<h1>Agendar um serviço</h1>
<table>
    <?php  foreach($services as $value):
        echo "$value <br>"
    ?>
    <?php endforeach;?>
       
</table>

<?php  foreach($services as $cervice): ?>

<?php endforeach;  ?>



<?php
require_once("templates/footer.php");
?>