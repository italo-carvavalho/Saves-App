<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

?>

<?php
$fk_id_client = $_SESSION['id_client'];


$stmt = $conn->query("SELECT p.id_profession, s.image, p.city, sc.id_schedule,sc.fk_id_profession,
p.name, s.name_services, sc.date_hour, sc.situation, sc.fk_id_client, sc.fk_id_services 
		FROM schedule As sc JOIN profession  AS p
		ON sc.fk_id_profession = p.id_profession
		JOIN services As s
		ON fk_id_services = id_services
        
		");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?php require_once("templates/header.php")  ?>

<h2 style="text-align:center; margin-top:30px;">Agendamentos Realizados</h2>

<div class="header-fixed">
    <table>
        <thead>
            <tr >
				<th>Imagem</th>
                <th>Nome do Profissional</th>
                <th>Serviço</th>
                <th>Cidade</th>
                <th>Situação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
           <?php foreach($schedules as $schedule): ?>

            <tr>
                <td><img src="<?= $schedule['image'] ?>" alt=""></td>
                <td><?= $schedule['name'] ?></td>
                <td><?= $schedule['name_services'] ?></td>
                <td><?= $schedule['city'] ?></td>
                <td><?= $schedule['situation'] ?></td>
               
              
                <?php if($schedule['situation'] == 'Pendente'){ ?>
                <td><a href="delete_schedule.php?id=<?= $schedule['id_schedule'] ?>">Cancelar</a></td>
                <?php }elseif($schedule['situation'] == 'Em andamento'){   ?>
                <td><a href="delete_schedule.php?id=<?= $schedule['id_schedule'] ?>">Confirmar</a></td> 
                <?php }  ?>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>




<?php
require_once("templates/footer.php")
?>