<?php 
require_once("templates/header.php");

$fk_id_profession = $_SESSION['id_profession'];



$stmt = $conn->query("SELECT s.id_services, s.fk_id_profession , p.id_profession,
                    p.name , s.name_services, s.description, s.image
                    FROM services AS s  JOIN profession AS p 
                    ON fk_id_profession = id_profession
                    WHERE s.fk_id_profession = $fk_id_profession");
$servicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = $conn->query("SELECT p.id_profession, p.name FROM profession AS p
WHERE id_profession = $fk_id_profession");
$profession = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($profession as $prof) {
    
}

foreach ($servicos as $servico) {

}

?>
  
<main>
  
<div class="grid">
    <div class="card">
        <div class="profile-sidebar">
            <img class="profile-image" src="<?= isset($servico['image']) ? $servico['image'] : 'images/user2.png'; ?>" style="width:100px" alt="">
          <!--  <ul class="social-list">
              <li class="social-item"><a aria-label="dribbble" class="social-link" href=""><i class="fab fa-dribbble-square"></i></a></li>
              <li class="social-item"><a aria-label="facebook" class="social-link" href=""><i class="fab fa-facebook-square"></i></a></li>
              <li class="social-item"><a aria-label="twitter" class="social-link" href=""><i class="fab fa-twitter-square"></i></a></li>
            </ul> -->
        </div>
        <div class="profile-main">
            <h2 class="profile-name"><?= isset($prof['name']) ? $prof['name'] : ""  ?></h2>
            <p class="profile-position"><?= isset($servico['nome_services']) ? $servico['nome_services'] : ""  ?></p>
            <p class="profile-body"><?= isset($servico['description']) ? $servico['description'] : ""  ?></p>
        </div>
    </div>

  
</div>

    <a href="cadastrar_servico.php?id=<?= $servicos['fk_id_profession'] ?>" class="profile-button1">Editar</a>
    <a href="deletar_servico.php?id=<?= $servicos['fk_id_profession'] ?>"  class="profile-button2">Excluir</a>

</main>



<?php require_once("templates/footer.php")?> 