<?php require_once("templates/header.php"); ?>


<main class="container">

    <h3>Complete Suas Informações</h3>

    <form action="" method="post" enctype="multipart/form-data">

     <div>
         <label for="">Nome</label>
         <input type="text" name="name" id="">
     </div>

     <div>
         <label for="">E-mail</label>
         <input type="email" name="email" id="">
     </div>

     <div>
         <label for="">Telefone</label>
         <input type="tel" name="telefone" id="">
     </div>


     <div>
        <label for="">Profissão</label>
        <select id="profissao" name="service">
           <option value=""></option>
            <option value="pedreiro">Pedreiro</option>
            <option value="pintor">Pintor</option>
            <option value="gessseiro">Gesseiro</option>
            <option value="eletricista">Eletricista</option>
        </select>
     </div>

     <div>
        <label for="">Cidade</label>
        <select id="cidade" name="service">
            <option value=""></option>
            <option value="Igarassu">Igarassu</option>
            <option value="Abreu e Lima">Abreu e Lima</option>
            <option value="Paulista">Gesseiro</option>
            <option value="Itamaraca">Itamaracá</option>
            <option value="Itapissuma">Eletricista</option>
        </select>
     </div>

    <div>
        <label for="">Foto</label>
         <input type="file" name="image" /></br>
    </div>

    </form>

</main>

<?php require_once("templates/footer.php") ?> 