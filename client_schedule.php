<?php
require_once("templates/header.php");
?>

<?php
$stmt = $conn->query("SELECT * FROM services INNER JOIN users WHERE users.id_user = services.fk_id_user");
$services = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?= var_dump($services['name'])?>


<?php
require_once("templates/footer.php");
?>