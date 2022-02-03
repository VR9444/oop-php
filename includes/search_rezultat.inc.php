<?php
$search = $_POST['searchParam'];

include "../class/dbConn.class.php";
include "../class/search_rezultat.class.php";
include "../class/search_rezultat_contr.class.php";

$search = new SearchRezultatiContr($search);
$search->searchFunction();
