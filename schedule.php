<?php
require_once("templates/header.php");
?>

<?php

$stmt = $conn->query("SELECT name, email, city , name_services, image
FROM services INNER JOIN users WHERE id_user = fk_id_user");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<h2 style="text-align:center; margin-top:30px;">Agendar um serviço</h2>


<div class="header-fixed">
    <table>
            <tr>
                <th>Image</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Serviço</th>
                <th>Cidade</th>
                <th>Agendar</th>
            </tr>
           <?php foreach($services as $service): ?>
            <tr>
                <td><img src="images/perfil.png" alt=""></td>
                <td><?= $service['name'] ?></td>
                <td><?= $service['email'] ?></td>
                <td><?= $service['name_services'] ?></td>
                <td><?= $service['city'] ?></td>
                <td><button>Agendar</button></td>
            </tr>  
            <?php endforeach; ?>
    </table>
</div>



<?php
require_once("templates/footer.php");
?>