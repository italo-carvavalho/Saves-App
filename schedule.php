<?php
require_once("templates/header.php");
?>

<?php




$stmt = $conn->query("SELECT s.id_services, s.fk_id_profession, p.id_profession, s.image, s.name_services,
p.name, p.email, p.city 
FROM services As s JOIN profession as p ON s.fk_id_profession = p.id_profession");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<h2 style="text-align:center; margin-top:30px;">Agendar um serviço</h2>


<div class="header-fixed">
    <table>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Serviço</th>
                <th>Cidade</th>
                <th>Agendar</th>
                
            </tr>
           <?php foreach($services as $service): ?>

            <tr class="e">
                <td><?= $service['id_services']?></td>
                <td><img src="<?= $service['image'] ?>" alt=""></td>
                <td><?= $service['name'] ?></td>
                <td><?= $service['email'] ?></td>
                <td><?= $service['name_services'] ?></td>
                <td><?= $service['city'] ?></td>
                <form action="process_schedule.php" method="post">
                  <input type="hidden" name="situation" value="Pendente">
                  <input type="hidden" name="fk_id_profession" value="<?= $service['fk_id_profession'] ?>">
                  <input type="hidden" name="fk_id_services" value="<?= $service['id_services'] ?>">
                  <td><button type="submit">Agendar</button></td>
                </form>
                
            </tr>  
            <?php endforeach; ?>
    </table>
</div>



<?php
require_once("templates/footer.php");
?>