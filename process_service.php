<?php 


require_once("conexao.php");
require_once("globals.php");
require_once("Model/Message.php");

$message = new Message($BASE_URL);

$fk_id_user = $_SESSION['id_user'];

$stmt = $conn->query("SELECT * FROM servicos WHERE fk_id_user = '{$fk_id_user}'");
$servicos = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($servicos)){

	$dados = $_POST;
	$nome_servico = $dados['nome_servico'];
	$descricao = $dados['descricao'];
	$image = $_FILES['image'];

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

		$sql = "UPDATE servicos SET nome_servico = :nome_servico, descricao = :descricao, image = :image 
		WHERE fk_id_user = :fk_id_user";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":nome_servico",$nome_servico);
			$stmt->bindParam(":descricao",$descricao);
			$stmt->bindParam(":image",$path);
			$stmt->bindParam(":fk_id_user",$fk_id_user);
			$stmt->execute();
			
			$message->setMessage("Serviço atualizado com sucesso","success","back");
	}else{
		$message->setMessage("Erro no upload da imagem","error","back");
	}
}

echo "vazio";
die;


if($_POST['type'] == "cadastrar_servico"){

	$dados = $_POST;

	$nome_servico = $dados['nome_servico'];
	$descricao = $dados['descricao'];
	$image = $_FILES['image'];


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
		//echo "deu certo <a target=\"_blank\" href=\"images/$novoNomeDoArquivo.$extensao\">Clique aqui</a>";
        if($nome_servico && $descricao){
		
				try{
				$sql = "INSERT INTO servicos(nome_servico,descricao,image,fk_id_user) 
				VALUES(:nome_servico,:descricao,:image,:fk_id_user)";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(":nome_servico",$nome_servico);
					$stmt->bindParam(":descricao",$descricao);
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
