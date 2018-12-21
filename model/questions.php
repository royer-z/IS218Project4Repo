<?php
class Questions {
    private $email, $questions = array();

    public function __construct($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getQuestions() {
        return $this->questions;
    }

    public function setQuestions($value) {
        array_push($this->questions, $value);
    }
}

class Question {
    private $email, $id, $title, $body, $skills, $answers;

    public function __construct($email) {
        $this->email = $email;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function setAnswers($value) {
        $this->answers = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($value) {
        $this->body = $value;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function setSkills($value) {
        $this->skills = $value;
    }
}

