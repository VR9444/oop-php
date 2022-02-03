<?php

$searchparam = $_POST['search'];


include "../class/dbConn.class.php";
include "../class/search.class.php";
include "../class/search-contr.class.php";



$search = new SearchContr($searchparam);
$search->searchFunction();