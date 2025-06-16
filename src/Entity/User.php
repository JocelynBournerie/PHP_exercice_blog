<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name:'discr',type:'string')]
#[ORM\DiscriminatorMap([
    'author'=>Author::class
])]

class User
{

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private $id;

    #[ORM\Column(type: 'string')]
    protected string $firstname;

    #[ORM\Column(type: 'string')]
    protected string $lastname;

    #[ORM\Column(type: 'string', nullable:true)]
    protected string $pseudo;

    #[ORM\Column(type: 'string')]
    protected string $email;

    #[ORM\Column(type: 'string', nullable:true)]
    protected string $password;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }


    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }


    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }
}
