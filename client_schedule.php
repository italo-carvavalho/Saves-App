<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php
$fk_id_user = $_SESSION['id_user'];

$sql = ("SELECT * FROM schedule WHERE id_user = $fk_id_user");
$stmt = $conn->prepare($sql);
$stmt->execute();
	

while($list = $stmt->fetch(PDO::FETCH_ASSOC)):

?>

	<li><?php echo $list['solicitation']; ?></li>

<?php endwhile; ?>

<?php
require_once("templates/footer.php")
?>