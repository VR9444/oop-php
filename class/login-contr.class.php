<?php
class LoginContr extends Login
{

    private $username;
    private $password;


    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function Login(){
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        $this->getLogin($this->username,$this->password);
    }

    private function  emptyInput(){
        if(empty($this->username) ||empty($this->password)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}

