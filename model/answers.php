<?php
class Answers {
    private $questionId, $answers = array();

    public function __construct($questionId) {
        $this->questionId = $questionId;
    }

    public function getQuestionId() {
        return $this->questionId;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function setAnswers($value) {
        array_push($this->answers, $value);
    }
}

class Answer {
    private $answerId, $answer, $voteCount;

    public function __construct($id) {
        $this->answerId = $id;
    }

    public function getAnswerId() {
        return $this->answerId;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($value) {
        $this->answer = $value;
    }

    public function getVoteCount() {
        return $this->voteCount;
    }

    public function setVoteCount($value) {
        $this->voteCount = $value;
    }
}