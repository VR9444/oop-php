<?php
class SignupContr extends Signup {

    private $username;
    private $password;
    private $passreap;
    private $email;

    public function __construct($username,$password,$passreap,$email){
        $this->username = $username;
        $this->password = $password;
        $this->passreap = $passreap;
        $this->email = $email;
    }
    public function signupUser(){
        if($this->emptyInput() ==false){
            header("location: ../index?error=emptyInput");
            exit();
        }
        if($this->invalidUsername() ==false){
            header("location: ../index.php?error=invalidUsername");
            exit();
        }
        if($this->passMatch() ==false){
            header("location: ../index.php?error=passDontMatch");
            exit();
        }
        if($this->passMatch() ==false){
            header("location: ../index.php?error=passDontMatch");
            exit();
        }
        if($this->userTaken()==false){
            header("location: ../index.php?error=userOrEmailTaken");
            exit();
        }
        $this->setUser($this->username,$this->password,$this->email);
    }
    private function  emptyInput(){
        if(empty($this->username) ||empty($this->passreap) ||empty($this->password) ||empty($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidUsername(){
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->username))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private  function passMatch(){
        if($this->password !== $this->passreap){
            $result = false;
        }
        else{
            $result = true;

        }
        return $result;
    }
    private function userTaken(){
        if($this->checkUser($this->username,$this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}