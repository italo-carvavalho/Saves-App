<?php require_once("templates/header.php"); 


//<!-- <main class="container"> -->

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->query("SELECT * FROM servicos WHERE fk_id_user = '{$id}'");
    $servicos = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
  
<form action="process_service.php" enctype="multipart/form-data" class="form-profissional" method="post">
    <fieldset>
        <legend>Cadastre um Serviço</legend>
      
        <input type="hidden" name="type" value="cadastrar_servico">
       
         <div>
             <input type="text" name="nome_servico" id="" value="<?= isset($servicos['nome_servico']) ? $servicos['nome_servico'] : ""  ?>" placeholder="Digite o seu serviço">
        </div>
           
            <div>
                <textarea placeholder="Descreva seu serviço" name="descricao" id="" cols="10" rows="5"><?= isset($servicos['descricao']) ? $servicos['descricao'] : "" ?></textarea>
            </div>

            <div class="form-group">
                <label style="color:rgb(110,110,110)" for="image">Foto:</label>
                <input type="file" class="form-control-file" name="image">
            </div>


            <div>
                <input type="submit" value="Enviar">
            </div>
    </fieldset>
</form>

  

<!-- </main> -->

<?php require_once("templates/footer.php") ?> 