<?php require_once("templates/header.php"); ?>


<!-- <main class="container"> -->

  
<form action="process_service.php" enctype="multipart/form-data" class="form-profissional" method="post">
    <fieldset>
        <legend>Cadastre um Serviço</legend>
       <!-- <div><input type="text" name="name_servico" id="" placeholder="Digite o seu serviço"></div>
        <div><input type="email" name="email" id="" placeholder="Digite o seu e-mail"></div> -->
        <input type="hidden" name="type" value="cadastrar_servico">
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

  

<!-- </main> -->

<?php require_once("templates/footer.php") ?> 