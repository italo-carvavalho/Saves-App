<?php 



class User
{
	public $id_user;
	public $name;
	public $email;
	public $telefone;
	public $password;
	public $token;

	public function gerarToken(){
		return bin2hex(random_bytes(50));
	}

	public function gerarSenha($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

}


interface UserDaoInterface{

	public function construirUsuario($data);

	public function criar(User $user, $authUser = false);

	public function buscarPorEmail($email);

	public function setTokenToSession($token,$redirect = true);

	public function verifyToken($protegido = false);

	public function findByToken($token);

	public function destroiToken();

	public function autenticarUsuario($email,$senha);

	public function update(User $user, $redirect = true);
}