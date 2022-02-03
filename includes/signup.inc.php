<?php
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['Password'];
    $passreap = $_POST['Pass-reap'];
    $email = $_POST['email'];
    include "../class/dbConn.class.php";
    include "../class/signup.class.php";
    include "../class/signup-contr.class.php";



    $signup = new SignupContr($username,$password,$passreap,$email);



    $signup->signupUser();



    header("location: ../index.php?error=none");

}
