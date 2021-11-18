<?php 



class User
{
	public $id_user;
	public $name;
	public $email;
	public $phone;
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
}