<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

?>

<?php
$fk_id_prefession = $_SESSION['id_client'];


$stmt = $conn->query("SELECT s.image, c.city, sc.id_schedule,s.fk_id_profession,
c.name, s.name_services, sc.date_hour, sc.situation, sc.fk_id_client, sc.fk_id_services 
		FROM schedule As sc JOIN client AS c
		ON sc.fk_id_profession = c.id_client
		JOIN services As s
		ON fk_id_services = id_services
		");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require_once("templates/header.php")  ?>

<div class="header-fixed">
    <table>
        <thead>
            <tr>
				<th>Imagem</th>
                <th>Nome do Profissional</th>
                <th>Serviço</th>
                <th>Cidade</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
           <?php foreach($schedules as $schedule): ?>

            <tr>
                <td><img src="<?= $schedule['image'] ?>" alt=""></td>
                <td><?= $schedule['name'] ?></td>
                <td><?= $schedule['name_services'] ?></td>
                <td><?= $schedule['city'] ?></td>
                <td><?= $schedule['situation'] ?></td>
               
                
                <td><a href="delete_schedule.php?id=<?= $fk_id_profession ?>">Cancelar</a></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>