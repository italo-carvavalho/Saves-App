<?php 

namespace App\Model;

class User 
{

   private $id_user;
   private $name;
   private $lastname;
   private $email;
   private $phone;
   private $password;

}

interface UserDaoInterface
{

    public function authenticateUser($email,$password);

}