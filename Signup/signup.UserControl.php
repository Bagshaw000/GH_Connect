<?php
 /**
  * this file runs the validation for the user signup
  */

  session_start();
include "signup.insert.php";
  class signupControlUser extends signUp{

    private $fname;
    private $lname;
    private $email;
    private $password;
    private $passwordcon;


    function __construct($fname,$lname,$email,$password,$passwordcon){
        $this->fname= $fname;
        $this ->lname= $lname;
        $this->email=$email;
        $this->password=$password;
        $this->passwordcon=$passwordcon; 
    }

    //check for empty input
    function emptyInput(){
        $result= '';
        if(empty($this->fname)||empty($this->email)||empty($this->password)||empty($this->lname)){
            return $result=false;
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
            return $result= false;
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
     function Usercheck(){
        $result='';
        $adminObj= new signUp();

        if ($adminObj->checkUser($this->email)== true){
           return  $result= true;
        }
        else{
            return  $result= false;
        }

        return $result;
    }
   
    //runs all the validation  functions
    function validateInput(){
        if($this->emptyInput()==false){
            header('location: ../MainInterface/SignUp.php?error=emptyinput');
               exit();
       }

        if($this->invalidEmail()==false){
           header('locaction: ../MainInterface/SignUp.php?error=invalidemail');
           exit();
        } 

        if($this->validatePassword()==false){
           header('locaction: ../MainInterface/SignUp.php?error=Invalidpassword');
           exit();
        }
        if($this->comparePassword()==false){
            $_SESSION['checkPassword']='Password do not match';
           header('locaction: ../MainInterface/SignUp.php?error=checkpassword');
           exit();
        } 
        if($this->Usercheck()==false){
           header('locaction: ../MainInterface/SignUp.php?error=userexist');
           exit();
        }
        
        $insertUser= new signUp();
        $insertUser->setUser($this->fname,$this->lname,$this->email,$this->password);
    }



  }