<?php
require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");
require_once("templates/header.php")
?>

<?php
$fk_id_user = $_SESSION['id_user'];

$stmt = $conn->query("SELECT  s.image, u.city, u.id_user, 
u.name, s.name_services, sc.date_hour, sc.situation, sc.fk_id_user, sc.fk_id_services 
		FROM schedule as sc JOIN users as u
		ON sc.fk_id_user = u.id_user
		JOIN services as s
		ON fk_id_services = id_services
		WHERE sc.fk_id_user = $fk_id_user");
$schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);


/*
SELECT L.Nome_Livro AS Livro,
A.Nome_autor AS Autor,
E.Nome_Editora AS Editora,
L.Preco_Livro AS 'Preço do Livro'
FROM tbl_Livro AS L
INNER JOIN tbl_autores AS A
ON L.ID_autor = A.ID_autor
INNER JOIN tbl_editoras AS E
ON L.ID_editora = E.ID_editora
WHERE E.Nome_Editora LIKE 'O%'
ORDER BY L.Preco_Livro DESC;
*/
	
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