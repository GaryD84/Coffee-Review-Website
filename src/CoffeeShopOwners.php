<?php


namespace Tudublin;


class CoffeeShopOwners
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS CoffeeShopOwners (
    id integer PRIMARY KEY AUTO_INCREMENT,
    username text,
    password text,
    role text
)
HERE;

    private $id;
    private $username;
    private $password;
    private $role = 'ROLE_SHOP';

    public function getRole()
    {
        return $this->role;
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

    public function getCoffeeShopOwnersname()
    {
        return $this->CoffeeShopOwnersname;
    }

    public function setCoffeeShopOwnersname($CoffeeShopOwnersname)
    {
        $this->CoffeeShopOwnersname = $CoffeeShopOwnersname;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }
}