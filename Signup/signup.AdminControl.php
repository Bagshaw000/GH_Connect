<?php
/**
 * this file controls all the validation process for the signup process
 */
session_start();

 include "signup.insert.php";
 class signupControlAdmin extends signUp{
     private $busname;
     private $email;
     private $password;
     private $passwordcon;
     private $region;
     private $bussinesstype;
     private $address;

     function __construct($busname,$email,$password,$passwordcon,$region,$businesstype,$address){
         $this->busname= $busname;
         $this->email=$email;
         $this->password=$password;
         $this->region= $region;
         $this->bussinesstype=$businesstype;
         $this->passwordcon= $passwordcon;
         $this->address=$address;
     }

     //check for empty input
     function emptyInput(){
         $result= '';
         if(empty($this->busname)||empty($this->email)||empty($this->password)||empty($this->region)||empty($this->bussinesstype)||empty($this->address)){
             return $result==false;
         }
         else {
             return $result=true;
         }
         return $result;
     }

     //validate the email used
     function invalidEmail(){
         $result='';
         if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
             return $result=false;
         }
         else{
             return $result=true;
         }
         return $result;
     }

     //validate the two password
     function comparePassword(){
         $result='';
         if($this->password!== $this->passwordcon){
             return $result=false;
         }
         else{
             return $result=true;
         }
         return $result;
     }


     //checks if the password meets the standard prescibed

     function validatePassword(){
        $result= '';
        $uppercase= preg_match('@[A-Z]@',$this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);
        $specialChars = preg_match('@[^\!#$%&*]@', $this->password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 8) {
            return $result=false;
        }else{
            return $result=true;
        }
        return $result;
     }

     //checks if the there exists an admin with the same email
     function Admincheck(){
         $result='';
         $adminObj= new signUp();

         if (!$adminObj->checkAdmin($this->email,$this->bussinesstype)){
            return  $result= false;

            header('location: ../MainInterface/AdminSignup.php?error==adminexist');
            exit();
         }
         else{
             return  $result= true;
         }

         return $result;
     }
    
     //runs all the validation  functions
     function validateInput(){
         if($this->emptyInput()==false){
             
            header('location: ../MainInterface/AdminSignup.php?error==emptyinput');
               exit();
        }

         if($this->invalidEmail()==false){
            header('location: ../MainInterface/AdminSignup.php?error==invalidemail');
            exit();
         } 

         if($this->validatePassword()==false){
            header('location: ../MainInterface/AdminSignup.php?error=invalidpassword');
            exit();
         }
         if($this->comparePassword()==false){
            $_SESSION['checkPassword']='Password do not match';
            header('location: ../MainInterface/AdminSignup.php?error=checkpassword');
            exit();
         } 
         
         $this->Admincheck();
         $insertAdmin= new signUp();
         $insertAdmin->setAdmin($this->busname,$this->email,$this->password,$this->address,$this->region,$this->bussinesstype);
         
    
        }

     

 }

?>