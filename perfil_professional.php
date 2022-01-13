<?php 
require_once("templates/header.php");


?>
  
<form action="process_services.php" enctype="multipart/form-data" class="form-profissional" method="post">
    <fieldset>
        <legend>Cadastre um Serviço</legend>
       <!-- <div><input type="text" name="name_servico" id="" placeholder="Digite o seu serviço"></div>
        <div><input type="email" name="email" id="" placeholder="Digite o seu e-mail"></div> -->
        <input type="hidden" name="type" value="register_services">
         <div>
             <select name="name_services" id="">
                <option disabled selected value="">Qual a sua serviço?</option>
                <option value="Eletricista">Eletricista</option>
                <option value="Gesseiro">Gesseiro</option>
                <option value="Pedreiro">Pedereiro</option>
                <option value="Pintor">Pintor</option>
             </select>
         </div>
         

            <div>
                <textarea placeholder="Descreva seu serviço" name="description" id="" cols="10" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label style="color:rgb(110,110,110)" for="image">Foto:</label>
                <input type="file" class="form-control-file" name="image">
            </div>


            <div>
                <input type="submit" value="send">
            </div>
    </fieldset>
</form>

  
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