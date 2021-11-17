<?php 

require_once("Model/User.php");

class UserDao implements UserDaoInterface{

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

		$user->id_user = $data['id_user'];
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->telefone = $data['telefone'];
		$user->password = $data['password'];
		$user->token = $data['token'];

		return $user;

	}
}


