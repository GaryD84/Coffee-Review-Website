<?php


namespace Tudublin;


class Staff
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS Staff (
    id integer PRIMARY KEY AUTO_INCREMENT,
    username text,
    password text,
    role text
)
HERE;

    private $id;
    private $username;
    private $password;
    private $role = 'ROLE_Staff';

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

    public function getStaffname()
    {
        return $this->username;
    }

    public function setStaffname($Staffname)
    {
        $this->Staffname = $Staffname;
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