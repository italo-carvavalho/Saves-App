<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php
$fk_id_user = $_SESSION['id_user'];

$stmt = $conn->query("SELECT sc.id_schedule, s.image, u.city, u.id_user, u.name, s.name_services, sc.date_hour, sc.situation,
                      sc.fk_id_user, sc.fk_id_services 
		FROM schedule as sc JOIN users as u
		ON fk_id_user = $fk_id_user
		JOIN services as s
		ON fk_id_services = id_services");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

	
?>

<div class="header-fixed">
    <table>
            <tr>
				<th>Imagem</th>
                <th>Nome do Profissional</th>
                <th>Serviço</th>
                <th>Cidade</th>
                <th>Situação</th>
            </tr>
           <?php foreach($schedules as $schedule): ?>

            <tr>
                <td><img src="<?= $schedule['image'] ?>" alt=""></td>
                <td><?= $schedule['name'] ?></td>
                <td><?= $schedule['name_services'] ?></td>
                <td><?= $schedule['city'] ?></td>
                <td><?= $schedule['situation'] ?></td>
               
                
                <td><a href="delete_schedule.php?id=<?= $fk_id_user ?>">Cancelar</a></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>