<?php

/**
 * this file get the input from the user 
 * Also calls all the other classes
 * Redirects to the dashboard
 */
include "../Signup/signup.AdminControl.php";
 if(isset($_POST["submit"])){
     $busname=$_POST['busname'];
     $email=$_POST['email'];
     $bustype=$_POST['dropdown'];
     $region=$_POST['region'];
     $address=$_POST['address'];
     $pass=$_POST['password'];
     $passcon=$_POST['confirmpass'];

    
    $signup= new signupControlAdmin($busname,$email,$pass,$passcon,$region,$bustype,$address);

    $signup->validateInput();

    header('location: ../MainInterface/Login-Admin.php');

     
     
 }