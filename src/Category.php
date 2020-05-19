<?php


namespace Tudublin;


class Category
{
    const CREATE_TABLE_SQL =
        <<<HERE
CREATE TABLE IF NOT EXISTS Category (
    id integer PRIMARY KEY AUTO_INCREMENT,
    username text,
    password text,
    role text,
    
)
HERE;

    private $id;
    //private $name;
    private $Category;
    private $password;
    //private $description;

    private $role = 'ROLE_CATEGORY';// user?

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

    public function getCategory()
    {
        return $this->Category;
    }

    public function setCategory($Category)
    {
        $this->Category = $Category;
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