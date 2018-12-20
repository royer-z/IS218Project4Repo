<?php
class UserDB {
    public static function getUser($email, $password) {
        $db = Database::getDB();

        $query = "SELECT email FROM accounts WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $returnedEmail = $statement->fetch();
        $statement->closeCursor();

        if ($returnedEmail["email"] === $email) {
            $query = "SELECT email, password FROM accounts WHERE email = :email AND password = :password";
            $statement = $db->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $statement->execute();
            $returnedPassword = $statement->fetch();
            $statement->closeCursor();

            if ($returnedPassword["password"] === $password) {
                $user = new User($returnedEmail["email"]);
                return $user;
            }
            else {
                return FALSE;
            }
        }
        else {
            return "needToRegister";
        }
    }

    public static function createUser($firstName, $lastName, $birthday, $email, $password) {
        $db = Database::getDB();

        $query = "INSERT INTO accounts (email, fname, lname, birthday, password) VALUES (:email, :firstName, :lastName, :birthday, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":firstName", $firstName);
        $statement->bindValue(":lastName", $lastName);
        $statement->bindValue(":birthday", $birthday);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getUserInfo($email) {
        $db = Database::getDB();

        $query = "SELECT fname, lname FROM accounts WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $account = $statement->fetch();
        $statement->closeCursor();

        $user = new User($email);
        $user->setFirstName($account["fname"]);
        $user->setLastName($account["lname"]);

        return $user;
    }
}