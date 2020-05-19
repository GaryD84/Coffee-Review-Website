<?php


namespace Tudublin;


class CoffeeShop
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS CoffeeShop (
    id integer PRIMARY KEY AUTO_INCREMENT,
    username text,
    password text,
    role text
)
HERE;

    private $id;
    //private $CoffeeShop name;
    private $password;
    private $role = 'ROLE_COFFEE SHOP'; //or user?
    private $CoffeeShopname;

    public function getRole()
    {
      //  return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCoffeeShopname()
    {
       return $this->CoffeeShopname;
    }

    public function setCoffeeShopname($CoffeeShopname)
    {
        $this->CoffeeShopname = $CoffeeShopname;
    }


    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }
}