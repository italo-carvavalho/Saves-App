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

$stmt = $conn->query("SELECT sc.id_schedule, sc.fk_id_client, sc.fk_id_profession, sc.fk_id_services, sc.situation,
                     c.id_client, c.name, c.email, c.city, c.phone,
                     p.id_profession, s.id_services, s.name_services
                     FROM schedule AS sc INNER JOIN client AS c
                     ON sc.fk_id_client = c.id_client
                     INNER JOIN profession AS p
                     ON sc.fk_id_profession = p.id_profession
                     INNER JOIN services AS s
                     ON sc.fk_id_services = s.id_services
                     WHERE p.id_profession = $id_profession");
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
                <th>Serviço</th>
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
                <td><?php echo $schedule['name_services']; ?></td>
                
                <td><a href="update_schedule.php?id=<?= $schedule['id_schedule'] ?>">Aceitar</a></td>
                <td><a href="delete_schedule.php?id=<?= $schedule['id_schedule'] ?>">Cancelar</a></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>