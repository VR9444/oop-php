<?php
class Login extends DbConn{

    protected function getLogin($username,$password){
        $stmt = $this->connect()->prepare("SELECT * FROM pdo_login WHERE username = ?");
        if(!$stmt->execute(array($username))){
            header("location: ../index.php?error=stmtfail");
            exit();
        }
        else{
            $row = $stmt->fetchAll();
            $passwordCheck = password_verify($password,$row[0]['password']);
            if(!$passwordCheck){
                header("location: ../index.php?error=incorectPwdOrUsername");
                exit();
            }
            else{
                session_start();
                $_SESSION['username']=$row[0]['username'];
            }
        }

    }
}
