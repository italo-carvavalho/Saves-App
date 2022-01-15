<?php
require_once("templates/header.php");
?>

<?php

$fk_id_profession = $_SESSION['id_client'];



$stmt = $conn->query("SELECT id_services, name_services, email, city, name, image, id_client,id_services, fk_id_profession
FROM services INNER JOIN client WHERE id_client = fk_id_profession");
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

            <tr>
                <td><?= $service['id_services']  ?></td>
                <td><img src="images/perfil.png" alt=""></td>
                <td><?= $service['name'] ?></td>
                <td><?= $service['email'] ?></td>
                <td><?= $service['name_services'] ?></td>
                <td><?= $service['city'] ?></td>
                <form action="process_schedule.php" method="post">
                  <input type="hidden" name="situation" value="Pendente">
                  <input type="hidden" name="fk_id_profession" value="<?= $fk_id_profession ?>">
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