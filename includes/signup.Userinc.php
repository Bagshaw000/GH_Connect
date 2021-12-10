<?php

/**
 * this file get the input from the user 
 * Also calls all the other classes
 * Redirects to the dshboard
 */

 if(isset($_POST["submit"])){
     $fname=$_POST['fname'];
     $email=$_POST['email'];
     $lname=$_POST['lname'];
     $pass=$_POST['password'];
     $passcon=$_POST['confirmpass'];
     echo $fname;

     include "../Signup/signup.UserControl.php";

     $signup= new  signupControlUser($fname,$lname,$email,$pass,$passcon);
     $signup->validateInput();
     
     header('Location: ../MainInterface/Login.php');
 }