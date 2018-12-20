<?php
class Answer {
    private $answerId, $voteCount;

    public function __construct($id) {
        $this->answerId = $id;
    }

    public function getAnswerId() {
        return $this->answerId;
    }

    public function getVoteCount() {
        return $this->voteCount;
    }

    public function setVoteCount($value) {
        $this->voteCount = $value;
    }

    public function upVote() {
        $this->voteCount++;
    }

    public function downVote() {
        $this->voteCount--;
    }
}