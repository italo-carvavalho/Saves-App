<?php 
require_once("templates/header.php");


?>
  
<main>
  
<div class="grid">
    <div class="card">
        <div class="profile-sidebar">
            <img class="profile-image" src="<?= isset($servicos['image']) ? $servicos['image'] : 'images/user2.png'; ?>" style="width:100px" alt="">
          <!--  <ul class="social-list">
              <li class="social-item"><a aria-label="dribbble" class="social-link" href=""><i class="fab fa-dribbble-square"></i></a></li>
              <li class="social-item"><a aria-label="facebook" class="social-link" href=""><i class="fab fa-facebook-square"></i></a></li>
              <li class="social-item"><a aria-label="twitter" class="social-link" href=""><i class="fab fa-twitter-square"></i></a></li>
            </ul> -->
        </div>
        <div class="profile-main">
            <h2 class="profile-name"><?= $user['name'] ?></h2>
            <p class="profile-position"><?= isset($servicos['nome_servico']) ? $servicos['nome_servico'] : ""  ?></p>
            <p class="profile-body"><?= isset($servicos['descricao']) ? $servicos['descricao'] : ""  ?></p>
        </div>
    </div>

  
</div>

    <a href="cadastrar_servico.php?id=<?= $id ?>" class="profile-button1">Editar</a>
    <a href="cadastrar_servico.php?id=<?= $id ?>"  class="profile-button2">Excluir</a>

</main>

<?php require_once("templates/footer.php")?> 