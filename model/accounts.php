<?php
class User {
    private $email, $password, $firstName, $lastName, $birthday;

    public function __construct($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($value) {
        $this->birthday = $value;
    }
}