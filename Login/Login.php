<?php
/**
 * This class allows the user login 
 */
include "../database/db.php";

class Login extends database{

    private $dbconnect;

    function __construct(){
        $dbconnect= new database();
        $this->dbconnect= $dbconnect;
    }

    

        public function getAdminUser($businesstype,$id,$password){
            //connecting to the database    //`".$businesstype."`
           
                $connection= $this->dbconnect->connect();
    
                $stmt= $connection->prepare("SELECT password FROM `".$businesstype."`  WHERE business_id=? ;"); 
               
               $dbarray= array($id);

                
                if(!$stmt->execute($dbarray)){
                    $stmt=null;
                    header('location: ../MainInterface/Login-Admin.php?error=stmtfailed');
                    exit();
            }
                //Checking if the user exist
                if($stmt->rowCount()==0){
                      $stmt= null;
                      header('location: ../MainInterface/Login-Admin.php?error=usernotfound');
                        exit();
                }
            
        
                //fetch hashed password  from the database
                $hashed= $stmt->fetchAll(PDO::FETCH_ASSOC);
              
                
                
                //comparing the hashed password and the passwor given by the user
                $checkpwd=password_verify($password ,$hashed[0]['password']); 
            
                
            
        
                //check if the password given is not correct
                 if($checkpwd==false){
                    $stmt= null;
                    header('location: ../MainInterface/Login-Admin.php?error=wrongpassword');
                    exit();
               }
                //If the password is correct we get all the information on that user
                  elseif($checkpwd==true){
                     $stmt= $connection->prepare("SELECT *   FROM  `".$businesstype."` WHERE business_id=? ;"); 
                    if(!$stmt->execute($dbarray)){
                         $stmt=null;
                         header('location: ../MainInterface/Login-Admin.php?error=stmtfailed');
                        exit();
                 }
                 // check the number of rows returned that satisfied the query
                    if($stmt->rowCount()==0){
                        $stmt= null;
                        header('location: ../MainInterface/Login-Admin?error=usernotfound');
                        exit();
                }
                $user= $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                session_start();
                   $_SESSION['id']= $user[0]['business_id'];
                     echo $_SESSION['id'];
                     $stmt=null;
        
               
              }
                
            }







            public function getUser($email,$password){
                //connecting to the database    
                   
                    $connection= $this->dbconnect->connect();
                    $stmt= $connection->prepare('SELECT password FROM  client WHERE email=? ;'); 
                   
                   $dbarray= array($email);
            
                    if(!$stmt->execute($dbarray)){
                        $stmt=null;
                        header('location: ../loginView.php?error=stmtfailed');
                        exit();
                }
                    //Checking if the user exist
                    if($stmt->rowCount()==0){
                          $stmt= null;
                          header('location: ../loginView.php?error=usernotfound');
                            exit();
                    }
                
            
                    //fetchinf the input forn the database
                    $hashed= $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<pre>';
                    var_dump($hashed);
                    echo '<pre>';
                    
                    
                    //comparing the hashed password and the passwor given by the user
                    $checkpwd=password_verify($password ,$hashed[0]['password']); 
                
                    
                
            
                    //check if the password given is correct
                     if($checkpwd==false){
                        $stmt= null;
                        header('location: ../MainInterface/Login.php?error=wrongpassword');
                        exit();
                   }
                    //If the password is correct we get all the information on that user
                      elseif($checkpwd==true){
                         $stmt= $connection->prepare('SELECT *   FROM  client WHERE email=? ;'); 
                        if(!$stmt->execute($dbarray)){
                             $stmt=null;
                             header('location: ../loginView.php?error=stmtfailed');
                            exit();
                     }
                     // check the number of rows returned that satisfied the query
                        if($stmt->rowCount()==0){
                            $stmt= null;
                            header('location: ../loginView.php?error=usernotfound');
                            exit();
                    }
                    $user= $stmt->fetchAll(PDO::FETCH_ASSOC);
                    session_start();
                       $_SESSION['email']= $user[0]['email'];
                         echo $_SESSION['email'];
                         $stmt=null;
                    
                
            
                   
                  }
                    
                }
            
            //check of the user email already exists in the database
}


