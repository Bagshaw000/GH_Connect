<?php

/**This file runs the insertion into the database
*/
include '../database/db.php';

class reviewAdd extends database{
    private $dbconnect;

    function __construct(){
        $dbconnect= new database();
        $this->dbconnect= $dbconnect;
    }

    function insertReview($name,$review,$business_id){
        $connect= $this->dbconnect->connect();

        $stmt= $connect->prepare('INSERT INTO review (name,review,business_id) values (?,?,?);');

        $dbarray= array($name,$review,$business_id);

        if (!$stmt->execute($dbarray)){
            $stmt= null;
            header('location: ..MainIterface/Review.php');
            exit();
        }
        
    }
}

?>