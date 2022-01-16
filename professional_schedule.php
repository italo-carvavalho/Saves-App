<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php



$fk_id_profession = $_SESSION['id_profession'];

$stmt = $conn->query("SELECT u.id_client, s.id_services, sc.situation, 
       c.name, c.email, c.phone, c.city, s.name_services
		FROM schedule as sc JOIN client as c
		ON sc.fk_id_user = u.id_client
		JOIN services as s
		ON fk_id_services = id_services
		WHERE sc.fk_id_profession = $fk_id_profession");
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
                <td><?= $schedule['name'] ?></td>
                <td><?= $schedule['email'] ?></td>
                <td><?= $schedule['phone'] ?></td>
                <td><?= $schedule['city'] ?></td>
                <td><?= $schedule['situation'] ?></td>
               
                
                <td><a href="update_schedule.php?id=<?= $fk_id_user ?>">Aceitar</a></td>
                <td><a href="delete_schedule.php?id=<?= $fk_id_user ?>">Cancelar</a></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>