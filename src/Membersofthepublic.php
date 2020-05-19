<?php


namespace Tudublin;


class Membersofthepublic
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS Membersofthepublic (
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
    private $membersofthepublicname;

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

    public function getmembersofthepublicname
    {
        return $this->membersofthepublicname;
    }

    public function setMembersofthepublicname($Membersofthepublicname)
    {
        $this->Membersofthepublicname = $Membersofthepublicname;
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