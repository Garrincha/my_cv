<?php

class Identity
{
    private $firstName;

    private $lastName;

    private $birthDate;

    public function __construct() {
        //nothing to do
    }

    public function getFirstName() {
        return $this->firstname;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;

        return $this;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;

        return $this;
    }
}
