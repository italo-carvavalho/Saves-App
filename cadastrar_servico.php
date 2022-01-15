<?php require_once("templates/header.php"); 


//<!-- <main class="container"> -->

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->query("SELECT * FROM services WHERE fk_id_profession = '{$id}'");
    $services = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
  
<form action="process_services.php" enctype="multipart/form-data" class="form-profissional" method="POST">
    <fieldset>
        <legend>Cadastre um Serviço</legend>
      
        <input type="hidden" name="type" value="register_services">
       
         <div>
             <input type="text" name="name_services" id="" value="<?= isset($services['name_services']) ? $services['name_services'] : ""  ?>" placeholder="Digite o seu serviço">
        </div>
           
            <div>
                <textarea placeholder="Descreva seu serviço" name="description" id="" cols="10" rows="5"><?= isset($services['description']) ? $services['description'] : "" ?></textarea>
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