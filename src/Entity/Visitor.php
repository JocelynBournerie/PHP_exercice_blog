<?php

namespace App\Entity;

use App\Entity\User;

use DateTime;

class Visitor extends User{
    private DateTime $dateOfBirth;

    public function __construct($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getDateOfBirth() : DateTime{
        return $this->dateOfBirth;
    }
    public function setDateOfBirth(DateTime $dateOfBirth){
        $this->dateOfBirth=$dateOfBirth;
        return $this;
    }
}