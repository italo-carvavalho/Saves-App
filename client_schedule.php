<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php
$sql = ("SELECT * FROM users");
$stmt = $conn->prepare($sql);
$stmt->execute();
$list = $stmt->fetch(PDO::FETCH_ASSOC)
if ($list['']) {
	
}
while():

?>

	<li><?php echo $list['name']; ?></li>

<?php endwhile; ?>

<?php
require_once("templates/footer.php")
?>