<?php
class QuestionDB {
    public static function getQuestions($email) {
        if ($email === "all") {
            $db = Database::getDB();

            $query = "SELECT owneremail, id, title, body, skills FROM questions";
            $statement = $db->prepare($query);
            $statement->execute();
            $returnedQuestions = $statement->fetchAll();
            $statement->closeCursor();
        }
        else {
            $db = Database::getDB();

            $query = "SELECT owneremail, id, title, body, skills FROM questions WHERE owneremail = :email";
            $statement = $db->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->execute();
            $returnedQuestions = $statement->fetchAll();
            $statement->closeCursor();
        }

        $questions = new Questions($email);

        foreach ($returnedQuestions as $question) {
            $question_obj = new Question($email);
            $question_obj->setEmail($question["owneremail"]);
            $question_obj->setId($question["id"]);
            $question_obj->setTitle($question["title"]);
            $question_obj->setBody($question["body"]);
            $question_obj->setSkills($question["skills"]);

            $questions->setQuestions($question_obj);
        }

        return $questions;
    }

    public static function createQuestion($email, $questionName, $questionBody, $questionSkills) {
        $db = Database::getDB();

        $query = "INSERT INTO questions (owneremail, title, body, skills) VALUES (:email, :questionName, :questionBody, :questionSkills)";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":questionName", $questionName);
        $statement->bindValue(":questionBody", $questionBody);
        $statement->bindValue(":questionSkills", $questionSkills);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getQuestion($questionId) {
        $db = Database::getDB();

        $query = "SELECT owneremail, id, title, body, skills FROM questions WHERE id = :questionId";
        $statement = $db->prepare($query);
        $statement->bindValue(":questionId", $questionId);
        $statement->execute();
        $returnedQuestion = $statement->fetch();
        $statement->closeCursor();

        $question = new Question($returnedQuestion["owneremail"]);
        $question->setId($returnedQuestion["id"]);
        $question->setTitle($returnedQuestion["title"]);
        $question->setBody($returnedQuestion["body"]);
        $question->setSkills($returnedQuestion["skills"]);

        $query = "SELECT id, answer, questionId FROM answers WHERE questionId = :questionId";
        $statement = $db->prepare($query);
        $statement->bindValue(":questionId", $questionId);
        $statement->execute();
        $returnedAnswers = $statement->fetchAll();
        $statement->closeCursor();

        $answers = new Answers($questionId);

        foreach ($returnedAnswers as $answer) {
            $answer_obj = new Answer($answer['id']);
            $answer_obj->setAnswer($answer['answer']);

            $answers->setAnswers($answer_obj);
        }

        $question->setAnswers($answers);

        return $question;
    }

    public static function editQuestion($questionId, $title, $body, $skills) {
        $db = Database::getDB();

        $query = "UPDATE questions SET title = :title, body = :body, skills = :skills WHERE id = :questionId";
        $statement = $db->prepare($query);
        $statement->bindValue(":title", $title);
        $statement->bindValue(":body", $body);
        $statement->bindValue(":skills", $skills);
        $statement->bindValue(":questionId", $questionId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function deleteQuestion($questionId) {
        $db = Database::getDB();

        $query = "DELETE FROM questions WHERE id = :questionId";
        $statement = $db->prepare($query);
        $statement->bindValue(":questionId", $questionId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function newAnswer($answer, $questionId) {
        $db = Database::getDB();

        $query = "INSERT INTO answers (answer, questionId) VALUES (:answer, :questionId)";
        $statement = $db->prepare($query);
        $statement->bindValue(":answer", $answer);
        $statement->bindValue(":questionId", $questionId);
        $statement->execute();
        $statement->closeCursor();
    }
}