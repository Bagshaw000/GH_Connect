<?php
// It instantiate the variables taken form the forntend and run some controls on them
/**
 * First extend the signup classs
 * 
 * instantiate it 
 * 
 * create the variable we would accept form in to the database from the  frontend
 * 
 * run controls on the inputs
 */

 include "login.php";

 class LoginContrUser extends Login{

    private $email;
    private $password;

    
    //instantiate  the variables
    function __construct($email,$password)
    {
        
        $this->password=$password;
        $this->email= $email;
        
    }

    //control for input
    function emptyinput(){
        $result= '';
        if (empty($this->email)||empty($this->password)){
            return $result=false;
        }
        else{
            return $result=true;
        }
        return $result;
        }
 

    //validate email
    function invalidemail(){
        $result='';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return $result=false;
        }
        else{
            return $result=true;
        }
        return $result;
    }

    

 
    //Checks all the validation done
   public function LoginUser(){
        if ($this->emptyinput()==false){
            header('location: ../MainInterface/Login.php?error=emptyinput');
            exit();
             }


        if ($this->invalidemail()==false){
            header('location: ../MainInterface/Login.php?error==invalid email');
            exit();
        }

        $getAdmin= new Login();
        $getAdmin->getUser($this->email,$this->password);
        return true;
       }  
}