<?php 

require_once("Model/Cliente.php");
require_once("Model/Message.php");

class ClienteDao implements ClienteDaoInterface{

	private $conn;
	private $url;
	private $message;

	public function __construct(PDO $conn,$url)
	{
		$this->conn = $conn;
		$this->url = $url;
		$this->message = new Message($url);

	}

	public function construirUsuario($data)
	{
		$cliente = new Cliente();

		$cliente->id_cliente = $data['id_user'];
		$cliente->name = $data['name'];
		$cliente->email = $data['email'];
		$cliente->telefone = $data['telefone'];
		$cliente->password = $data['password'];
		$cliente->token = $data['token'];

		return $cliente;

	}

	public function criar(Cliente $cliente, $authUser = false){
       
		$stmt = $this->conn->prepare("INSERT INTO users(
			name,email,telefone,password,token 
		)VALUES(
           :name,:email,:telefone,:password,:token
		)");
		$stmt->bindParam(":name",$cliente->name);
		$stmt->bindParam(":email",$cliente->email);
		$stmt->bindParam(":telefone",$cliente->telefone);
		$stmt->bindParam(":password",$cliente->password);
		$stmt->bindParam(":token",$cliente->token);

		$stmt->execute();

		//autenticar o usuario caso o auth seja true
		if($authUser){
			$this->setTokenToSession($cliente->token);
		}
	}

	public function setTokenToSession($token,$redirect = true){
		//salvar token na sessao 
        $_SESSION['token'] = $token;
		if($redirect){
			//redireciona para o perfil do usuario
			$this->message->setMessage("Seja bem vindo","success","editar_cliente.php");
		}
	}

	public function buscarPorEmail($email){

		if($email != "") {

        	$stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

        	$stmt->bindParam(":email", $email);

        	$stmt->execute();

        	if($stmt->rowCount() > 0) {

               $data = $stmt->fetch();
               $cliente = $this->construirUsuario($data);
          
               return $cliente;

            } else {
               return false;
            }

        } else {
          return false;
        } 

    }

	public function verifyToken($protegido = false){

		//verificar se sessão tem o tokem
		if(!empty($_SESSION["token"])) {

			// Pega o token da session
			$token = $_SESSION["token"];
	
			$cliente = $this->findByToken($token);
	
			if($cliente) {
			  return $cliente;
			} else if($protegido) {
	
			  // Redireciona usuário não autenticado
			  $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
	
			}
	
		  } else if($protegido) {
	
			// Redireciona usuário não autenticado
			$this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
	
		  }
	}

	public function findByToken($token){
		
		if($token != "") {

        	$stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

        	$stmt->bindParam(":token", $token);

        	$stmt->execute();

        	if($stmt->rowCount() > 0) {

               $data = $stmt->fetch();
               $cliente = $this->construirUsuario($data);
          
               return $cliente;

            } else {
              return false;
            }

        } else {
          return false;
        } 

	}

	public function destroiToken(){
		//remove o token da sessoa
		$_SESSION['token'] = "";
		//redirecionar e apresentarmessagem de sucesso
		$this->message->setMessage("Você fez o logout com sucesso!","success","index.php");
	}

	public function autenticarUsuario($email,$password){

		$cliente = $this->buscarPorEmail($email);

		if($cliente){
			
			//checar se as senhas batem
			if(password_verify($password, $cliente->password)){
               //gerar um token e inserir na seção
			   $token = $cliente->gerarToken();

			   $this->setTokenToSession($token,false);

				//atualizar o token no usuario  agora
				$cliente->token = $token;
				
				$this->update($cliente,false);
				
				return true;

			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function update(Cliente $cliente, $redirect = true){

		$stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email, telefone = :telefone, token = :token WHERE id_user = :id_user");

		$stmt->bindParam(":name",$cliente->name);
		$stmt->bindParam(":email",$cliente->email);
		$stmt->bindParam(":telefone",$cliente->telefone);
		$stmt->bindParam(":token",$cliente->token);
		$stmt->bindParam(":id_user",$cliente->id_cliente);
		$stmt->execute();

		if($redirect){
			//redireciona para o perfil do usuario
			$this->message->setMessage("Dados atualizados com sucesso!","success","editar_cliente.php");
		}

	}

}



