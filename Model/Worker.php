<?php 



class Worker
{
	public $id_worker;
	public $name;
	public $email;
	public $telefone;
	public $password;
	public $token;
	public $service;
	public $cidade;
	public $image;
	public $description;

	public function getFullName($worker){
		return $worker->name;
	}

	public function gerarToken(){
		return bin2hex(random_bytes(50));
	}

	public function gerarSenha($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

}


interface WorkerDaoInterface{

	public function construirUsuario($data);

	public function criar(Worker $worker, $authUser = false);

	public function buscarPorEmail($email);

	public function setTokenToSession($token,$redirect = true);

	public function verifyToken($protegido = false);

	public function findByToken($token);

	public function destroiToken();

	public function autenticarUsuario($email,$senha);

	public function update(Worker $worker, $redirect = true);
}