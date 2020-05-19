<?php


namespace Tudublin;


class User
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS User (
    id integer PRIMARY KEY AUTO_INCREMENT,
    username text,
    password text,
    role text
)
HERE;

    private $id;
    private $Username;
    private $password;
    private $role = 'ROLE_USER';

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

    public function getUsername()
    {
        return $this->Username;
    }

    public function setUsername($Username)
    {
        $this->Username = $Username;
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