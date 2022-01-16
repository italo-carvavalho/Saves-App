<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php
//$fk_id_profession = $_SESSION['id_profession'];

if (isset($_SESSION['id_profession'])) {

$id_profession = $_SESSION['id_profession'];

}

$stmt = $conn->query("SELECT p.name, p.email, p.phone, p.city, sc.situation FROM profession AS p INNER JOIN schedule AS sc WHERE id_profession = '{$id_profession}'");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="header-fixed">
    <table>
            <tr>
                <th>Nome do Cliente</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Situação</th>
                <th>Aceitar</th>
                <th>Cancelar</th>
            </tr>
           <?php foreach($schedules as $schedule): ?>

            <tr>
                <td><?php echo $schedule['name']; ?></td>
                <td><?php echo $schedule['email']; ?></td>
                <td><?php echo $schedule['phone']; ?></td>
                <td><?php echo $schedule['city']; ?></td>
                <td><?php echo $schedule['situation']; ?></td>
               
                
                <td><a href="update_schedule.php?id=<?= $fk_id_profession ?>">Aceitar</a></td>
                <td><a href="delete_schedule.php?id=<?= $fk_id_profession ?>">Cancelar</a></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>