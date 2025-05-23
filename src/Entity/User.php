<?php

namespace App\Entity;

class User{
    protected string $firstname;
    protected string $lastname;
    protected string $pseudo;
    protected string $email;
    protected string $password;

    public function getFirstname() : string {
        return $this->firstname;
    }
    public function setFirstname($firstname) : void{
        $this->firstname = $firstname;
    }


    public function getLastname() : string {
        return $this->lastname;
    }
    public function setLastname($lastname) : void{
        $this->lastname = $lastname;
    }


    public function getPseudo() : string {
        return $this->pseudo;
    }
    public function setPseudo($pseudo) : void{
        $this->pseudo = $pseudo;
    }


    public function getEmail() : string {
        return $this->email;
    }
    public function setEmail($email) : void{
        $this->email = $email;
    }


    public function getPassword() : string {
        return $this->password;
    }
    public function setPassword($password) : void{
        $this->password = $password;
    }


}