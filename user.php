<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;

    public function __construct($name, $email, $username, $password)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
}
