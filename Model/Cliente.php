<?php 



class Cliente
{
	public $id_cliente;
	public $name;
	public $email;
	public $telefone;
	public $password;
	public $token;
	

	public function getFullName($cliente){
		return $cliente->name;
	}

	public function gerarToken(){
		return bin2hex(random_bytes(50));
	}

	public function gerarSenha($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

}


interface ClienteDaoInterface{

	public function construirUsuario($data);

	public function criar(Cliente $cliente, $authUser = false);

	public function buscarPorEmail($email);

	public function setTokenToSession($token,$redirect = true);

	public function verifyToken($protegido = false);

	public function findByToken($token);

	public function destroiToken();

	public function autenticarUsuario($email,$senha);

	public function update(Cliente $cliente, $redirect = true);
}