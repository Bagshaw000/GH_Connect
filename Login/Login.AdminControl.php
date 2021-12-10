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

 include "Login.php";

 class LoginContr extends Login{

    private $id;
    private $password;
    private $businesstype;

    
    //instantiate  the variables
    function __construct($id,$password,$businesstype)
    {
        
        $this->password=$password;
        $this->id= $id;
        $this->businesstype=$businesstype;
        
    }

    //control for input
    function emptyinput(){
        $result= '';
        if (empty($this->id)||empty($this->password)||empty($this->businesstype)){
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
             header('location:../MainInterface/Login-Admin.php?error=emptyinput');
             exit();
           }

        $getAdmin= new Login();
        $getAdmin->getAdminUser($this->businesstype,$this->id,$this->password);
        return true;
       }  


public function ReturnId(){
    return $this->id;
}
 }