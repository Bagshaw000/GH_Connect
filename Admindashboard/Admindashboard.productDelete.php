<?php
include "../database/db.php";

class deleteProduct extends database{
    private $dbconnect;

    //instantiate the database connection 
    function __construct(){
        $dbconnect= new database();
        $this->dbconnect= $dbconnect;
    }

    //delete the image path from the database
    function deleteProduct($imagePath){
        $connection = $this->dbconnect->connect();

        $stmt= $connection->prepare("DELETE  FROM products WHERE products=?;");

        $deleteprod= array($imagePath);

        $stmt->execute($deleteprod);

        $product= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product;

    }

}


?>
