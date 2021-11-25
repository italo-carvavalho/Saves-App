<?php 

require_once("Model/User.php");
require_once("Model/Message.php");

class WorkerDao implements UserDaoInterface{

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

		$user->id_user = $data['id_work'];
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telefone = $data['telefone'];
		$user->password = $data['password'];
        $user->service = $data['service'];
        $user->cidade = $data['cidade'];
		$user->token = $data['token'];
		$user->description = $data['description'];


		return $user;

	}

	public function criar(User $user, $authUser = false){
       
		$stmt = $this->conn->prepare("INSERT INTO worker(
			name,email,telefone,service,cidade,description,password,token 
		)VALUES(
           :name,:email,:telefone,:service,:cidade,:description,:password,:token
		)");
		$stmt->bindParam(":name",$user->name);
		$stmt->bindParam(":email",$user->email);
		$stmt->bindParam(":telefone",$user->telefone);
        $stmt->bindParam(":service",$user->service);
        $stmt->bindParam(":cidade",$user->cidade);
		$stmt->bindParam(":description",$user->description);
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
			$this->message->setMessage("Seja bem vindo","success","editar_profissional.php");
		}
	}

	public function buscarPorEmail($email){

		if($email != "") {

        	$stmt = $this->conn->prepare("SELECT * FROM worker WHERE email = :email");

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

        	$stmt = $this->conn->prepare("SELECT * FROM worker WHERE token = :token");

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

	public function autenticarUsuario($email,$password){

		$user = $this->buscarPorEmail($email);

		if($user){
			
			//checar se as senhas batem
			if(password_verify($password, $user->password)){
               //gerar um token e inserir na seção
			   $token = $user->gerarToken();

			   $this->setTokenToSession($token,false);

				//atualizar o token no usuario  agora
				$user->token = $token;
				
				$this->update($user,false);
				
				return true;

			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function update(User $user, $redirect = true){

		$stmt = $this->conn->prepare("UPDATE worker SET name = :name, email = :email, telefone = :telefone,service = :service, cidade = :cidade, description = :description, token = :token WHERE id_work = :id_work");

		$stmt->bindParam(":name",$user->name);
		$stmt->bindParam(":email",$user->email);
		$stmt->bindParam(":telefone",$user->telefone);
        $stmt->bindParam(":service",$user->service);
        $stmt->bindParam(":cidade",$user->cidade);
		$stmt->bindParam(":description",$user->description);
		$stmt->bindParam(":token",$user->token);
		$stmt->bindParam(":id_work",$user->id_user);
		$stmt->execute();

		if($redirect){
			//redireciona para o perfil do usuario
			$this->message->setMessage("Dados atualizados com sucesso!","success","editarperfil.php");
		}

	}

}


