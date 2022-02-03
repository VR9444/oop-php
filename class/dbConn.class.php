<?php

class DbConn
{
    protected function connect(){
        try {
            $username = 'root';
            $password = '';
            $dbConn = new PDO('mysql:host=localhost:3307;dbname=projekat',$username,$password);
            return $dbConn;
        }
        catch (PDOException $e){
        print "Error!: " .$e->getMessage()."<br>";
        die();
        }

    }
}