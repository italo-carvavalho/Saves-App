<?php
require_once("templates/header.php");
?>

<?php
$stmt = $conn->query("SELECT * FROM servicos");
$servicos = $stmt->fetch(PDO::FETCH_ASSOC);
?>




<?php
require_once("templates/footer.php");
?>