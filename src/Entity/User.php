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
    public function setFirstname($firstname) : self{
        $this->firstname = $firstname;
        return $this;
    }


    public function getLastname() : string {
        return $this->lastname;
    }
    public function setLastname($lastname) : self{
        $this->lastname = $lastname;
        return $this;
    }


    public function getPseudo() : string {
        return $this->pseudo;
    }
    public function setPseudo($pseudo) : self{
        $this->pseudo = $pseudo;
        return $this;
    }


    public function getEmail() : string {
        return $this->email;
    }
    public function setEmail($email) : self{
        $this->email = $email;
        return $this;
    }


    public function getPassword() : string {
        return $this->password;
    }
    public function setPassword($password) : self{
        $this->password = $password;
        return $this;
    }


}