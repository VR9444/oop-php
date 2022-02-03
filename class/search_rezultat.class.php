<?php
class SearchRezultati extends DbConn{
    protected function search($search){
        $like = "'%".$search."%'";
        $stmt = $this->connect()->prepare("select * from pdo_login where username LIKE ".$like.";");
        if(!$stmt->execute()){
            echo "fail";
            exit();
        }
        else{
            $row = $stmt->fetchAll();
            echo json_encode($row);
        }

    }

}