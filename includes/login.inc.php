<?php
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['Password'];

    include "../class/dbConn.class.php";
    include "../class/login.class.php";
    include "../class/login-contr.class.php";


    $login = new LoginContr($username,$password);

    $login->Login();

    header("location: ../index.php?error=none");


}