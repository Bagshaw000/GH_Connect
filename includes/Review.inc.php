 <?php
/**
 * this file get the input from the user 
 * Also calls all the other classes
 * Redirects to the dashboard
 */
session_start();
include "../Review/Review.Control.php";

     $id=$_POST['id'];
     $name=$_POST['name'];
     $review=$_POST['review'];
     
    
    
     $insert= new reviewControl($name,$review,$id);
     $insert->validateInput();
     $_SESSION['ReviewInserted']='Successfully Review';
   
    header('location: ../MainInterface/Review.php? error=none');
