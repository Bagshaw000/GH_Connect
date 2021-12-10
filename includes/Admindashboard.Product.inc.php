<?php
session_start();
//get the button from the page

$imagePath= $_POST['Path'];

include "../Admindashboard/Admindashboard.productDelete.php";

$delete= new deleteProduct();
$delete->deleteProduct($imagePath);
//add the redirected path
$_SESSION['ProductDelete']= 'Successfully Deleted Product';
header('location: ../MainInterface/Admin-Dashboard.php');

