<?php 

require_once("Model/Worker.php");
require_once("Model/Message.php");

class WorkerDao implements WorkerDaoInterface{

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
		$worker = new Worker();

		$worker->id_worker = $data['id_work'];
		$worker->name = $data['name'];
		$worker->email = $data['email'];
		$worker->telefone = $data['telefone'];
		$worker->password = $data['password'];
        $worker->service = $data['service'];
        $worker->cidade = $data['cidade'];
		$worker->token = $data['token'];
		$worker->description = $data['description'];
		$worker->image = $data['image'];


		return $worker;

	}

	public function criar(Worker $worker, $authUser = false){
       
		$stmt = $this->conn->prepare("INSERT INTO worker(
			name,email,telefone,description,password,token 
		)VALUES(
           :name,:email,:telefone,:description, :password,:token
		)");
		$stmt->bindParam(":name",$worker->name);
		$stmt->bindParam(":email",$worker->email);
		$stmt->bindParam(":telefone",$worker->telefone);
       /* $stmt->bindParam(":service",$worker->service);
        $stmt->bindParam(":cidade",$worker->cidade); */
		$stmt->bindParam(":description",$worker->description); 
		$stmt->bindParam(":password",$worker->password);
		$stmt->bindParam(":token",$worker->token);

		$stmt->execute();

		//autenticar o usuario caso o auth seja true
		if($authUser){
			$this->setTokenToSession($worker->token);
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
               $worker = $this->construirUsuario($data);
          
               return $worker;

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
	
			$worker = $this->findByToken($token);
	
			if($worker) {
			  return $worker;
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
               $worker = $this->construirUsuario($data);
          
               return $worker;

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

		$worker = $this->buscarPorEmail($email);

		if($worker){
			
			//checar se as senhas batem
			if(password_verify($password, $worker->password)){
               //gerar um token e inserir na seção
			   $token = $worker->gerarToken();

			   $this->setTokenToSession($token,false);

				//atualizar o token no usuario  agora
				$worker->token = $token;
				
				$this->update($worker,false);
				
				return true;

			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function update(Worker $worker, $redirect = true){

		$stmt = $this->conn->prepare("UPDATE worker SET name = :name, email = :email, telefone = :telefone,service = :service, cidade = :cidade, description = :description, token = :token WHERE id_work = :id_work");

		$stmt->bindParam(":name",$worker->name);
		$stmt->bindParam(":email",$worker->email);
		$stmt->bindParam(":telefone",$worker->telefone);
    $stmt->bindParam(":service",$worker->service);
    $stmt->bindParam(":cidade",$worker->cidade);
		$stmt->bindParam(":description",$worker->description); 
		//$stmt->bindParam(":image",$worker->image);
		$stmt->bindParam(":token",$worker->token);
		$stmt->bindParam(":id_work",$worker->id_worker);
		$stmt->execute();

		if($redirect){
			//redireciona para o perfil do usuario
			$this->message->setMessage("Dados atualizados com sucesso!","success","editar_profissional.php");
		}

	}

}



