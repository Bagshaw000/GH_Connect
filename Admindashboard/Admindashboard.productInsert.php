<?php

session_start();

include "../database/db.php";

//connects to the database by calling the connect method 
$dbconnect= new database();
$connection=$dbconnect->connect();

//array to hold errors
$errors=[];

//checks if the form has been submitted


//get the business id from the form
$id= $_POST['id'];
echo $id;

//check if there no business id inputed
if(empty($id)){
  $error[]= "No id inputed";
  header('location: ../MainInterface/Home.php');
}


 //check if the image is in the "productImage" directory
  //If not then make the directory"productImage"
if(!is_dir('productImage')){
  mkdir('productImage');
}


//check if the error array is empty
if(empty($errors)){

  //get the image file given in the form
    $image = $_FILES['image'] ?? null;
    $imagePath='';
// this checks the image name and the temporary name from xampp
    if($image && $image['tmp_name']){
//Generates a random imagpath with the randomstring function created
      $imagePath = 'productImage/'.randomString(8).'/'.$image['name'];
//make the image path a directory
      mkdir(dirname($imagePath));
       //move to the temporary name given by xammp to the image path
        move_uploaded_file($image['tmp_name'],$imagePath);
    }
//Query to insert into the the products tab;e
$stmt= $connection->prepare("INSERT INTO products (business_id, products )
VALUES (?,?);");
$dataArray= array($id,$imagePath);

$stmt->execute($dataArray);
  $_SESSION['InsertStatus']= 'Product Successfully Uploaded';
 header('location: ../MainInterface/Admin-Dashboard.php');
}



//this function generates the random image path
function randomString($n){
  //list of character to pick from to form the path string
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str='';

  //loop through to pick the string and append them to a varaible
  for($i=0;$i<$n; $i++){
    $index= rand(0,strlen($characters) - 1);
    $str .= $characters[$index];
  }
//retuns the  string
return $str;

}

?>
