<?php 

namespace App;

use App\User;



class UserDao{

	private $conn;
	private $url;

	public function __contruct(PDO $conn,$url)
	{
		$this->conn = $conn;
		$this->url = $url;
	}

	public function buildUser($data)
	{
		$user = new User();

		$user->getIdUser() = $data['id'];
		$user->getName() = $data['name'];
		$user->getEmail() = $data['email'];
		$user->getTelefone() = $data['telefone'];
		$user->getPasword() = $data['password'];
		$user->getToken() = $data['token'];

		return $user;

	}
}