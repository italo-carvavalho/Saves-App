<?php 


require_once("connection.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$fk_id_user = $_SESSION['id_user'];


$stmt = $conn->query("SELECT * FROM services WHERE fk_id_user = '{$fk_id_user}'");
$servicos = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($servicos)){

	$dados = $_POST;
	$name_services = $dados['name_services'];
	$description = $dados['description'];
	$image = $_FILES['image'];

	echo $name_services." ".$description;
	die;

	$pasta = "images/";
	$nomeDoArquivo = $image['name'];
	$novoNomeDoArquivo = uniqid();
	$extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
	if($extensao != "jpg" && $extensao != "png"){
		$message->setMessage("Tipo de arquivo não aceito","error","back");
	}
	$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

	$deu_certo =move_uploaded_file($image["tmp_name"],$pasta . $novoNomeDoArquivo.".".$extensao);

	if($deu_certo){

		$sql = "UPDATE services SET name_service = :nome_service, description = :description, image = :image 
		WHERE fk_id_user = :fk_id_user";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":name_services",$name_services);
			$stmt->bindParam(":description",$description);
			$stmt->bindParam(":image",$path);
			$stmt->bindParam(":fk_id_user",$fk_id_user);
			$stmt->execute();
			
			$message->setMessage("Serviço atualizado com sucesso","success","back");
	}else{
		$message->setMessage("Erro no upload da imagem","error","back");
	}
}


if($_POST['type'] == "register_services"){

	$data = $_POST;

	$name_services = $data['name_services'];
	$description = $data['description'];
	$image = $_FILES['image'];

	$folder = "images/";
	$fileName = $image['name'];
	$newFileName = uniqid();
	$extension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	if($extension != "jpg" && $extension != "png"){
		$message->setMessage("Tipo de arquivo não aceito","error","back");
	}
	$path = $folder . $newFileName . "." . $extension;
	$success =move_uploaded_file($image["tmp_name"],$folder . $newFileName.".".$extension);

	if($success){
		//echo "deu certo <a target=\"_blank\" href=\"images/$novoNomeDoArquivo.$extensao\">Clique aqui</a>";
        if($name_services && $description){
		
				try{
				$sql = "INSERT INTO services(name_services,description,image,fk_id_user) 
				VALUES(:name_services,:description,:image,:fk_id_user)";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(":name_services",$name_services);
					$stmt->bindParam(":description",$description);
					$stmt->bindParam(":image",$path);
					$stmt->bindParam(":fk_id_user",$fk_id_user);

					$stmt->execute();
						
					$message->setMessage("Serviço cadastrado com sucesso","success","back");
				

				}catch(Exception $e){
				echo $e->getMessage();
				}
				

			
		}else{
			//enviar menssagem de erro de dados faltantes
			$message->setMessage("Campos nome do serviço e descrição são obrigatórios","error","back");
		}

    }else{
		$message->setMessage("Erro no upload da imagem","error","back");
	}

}
