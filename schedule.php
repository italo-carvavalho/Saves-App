<?php
require_once("templates/header.php");
?>

<?php
$stmt = $conn->query("SELECT u.name, s.name_services, s.image FROM services as s 
                      INNER JOIN users as u
                      WHERE s.fk_id_user = u.id_user");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Agendar um serviço</h1>

<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Serviço</th>
        </tr>
    </thead>
    <tbody>
    <?php  foreach($services as $cervice): ?>
    
    <?php endforeach;  ?>
    </tbody>
    
</table>
<?php  foreach($services as $cervice): ?>

<?php endforeach;  ?>



<?php
require_once("templates/footer.php");
?>