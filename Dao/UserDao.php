<?php 

require_once("Model/User.php");
require_once("Model/Message.php");

class UserDao implements UserDaoInterface{

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
		$user = new User();

		$user->id_user = $data['id_user'];
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telefone = $data['telefone'];
		$user->password = $data['password'];
		$user->token = $data['token'];

		return $user;

	}

	public function criar(User $user, $authUser = false){
       
		$stmt = $this->conn->prepare("INSERT INTO users(
			name,email,telefone,password,token 
		)VALUES(
           :name,:email,:telefone,:password,:token
		)");
		$stmt->bindParam(":name",$user->name);
		$stmt->bindParam(":email",$user->email);
		$stmt->bindParam(":telefone",$user->telefone);
		$stmt->bindParam(":password",$user->password);
		$stmt->bindParam(":token",$user->token);

		$stmt->execute();

		//autenticar o usuario caso o auth seja true
		if($authUser){
			$this->setTokenToSession($user->token);
		}
	}

	public function setTokenToSession($token,$redirect = true){
		//salvar token na sessao 
        $_SESSION['token'] = $token;
		if($redirect){
			//redireciona para o perfil do usuario
			$this->message->setMessage("Seja bem vindo","success","editarperfil.php");
		}
	}

	public function buscarPorEmail($email){

		if($email != "") {

        	$stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

        	$stmt->bindParam(":email", $email);

        	$stmt->execute();

        	if($stmt->rowCount() > 0) {

               $data = $stmt->fetch();
               $user = $this->construirUsuario($data);
          
               return $user;

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
	
			$user = $this->findByToken($token);
	
			if($user) {
			  return $user;
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
               $user = $this->construirUsuario($data);
          
               return $user;

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

}



