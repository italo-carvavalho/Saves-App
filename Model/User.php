<?php 



class User
{
	private $id_user;
	public $name;
	public $email;
	public $telefone;
	public $password;
	public $token;

	/*
	public function getIdUser()
	{
		return $this->id_user;
	}
	
	public function setIdUser($id_user)
	{
		$this->id_user = $id_user;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}
	
	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}

	public function getPassword()
	{
		return $this->password;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getToken()
	{
		return $this->token;
	}
	
	public function setToken($token)
	{
		$this->token = $token;
	} */
}


interface UserDaoInterface{

	public function buildUser($data);
}