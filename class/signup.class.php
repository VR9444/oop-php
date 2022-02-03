<?php

class Signup extends DbConn {


    protected function checkUser($username,$email){
        $stmt = $this->connect()->prepare('SELECT username FROM pdo_login where username = ? or email = ?;');
        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed1");
            exit();
            }

        if($stmt->rowCount()>0){
            $resultCheck =false;
        }
        else{
            $resultCheck = false;
        }
        return $resultCheck;

    }


    protected function setUser($username,$password,$email){
        $stmt = $this->connect()->prepare('INSERT INTO pdo_login(username,password,email) VALUES (?,?,?); ');

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username,$hashedPassword,$email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

}