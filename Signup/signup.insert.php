<?php
/**
 * This class connects to the databse and connects to the database
 */
include "../database/db.php";
require "Mail/PHPMailer.php";
require "Mail/SMTP.php";
require "Mail/Exception.php";
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class signUp extends database {

private $db;
// instantiate database connection when the class is run
 function __construct(){
     $db= new database();
     $this->db= $db;
 }

 

//generates and return the clients Id
function  generateClientId($pre){
    $clientId= $pre.rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    echo $clientId;
    return $clientId;
}

//insert the user into the database
 function setUser($fname,$lname,$email,$password){
    $connection= $this->db->connect();
    $stmt= $connection->prepare('INSERT INTO client (client_id, fname,lname, email,password) VALUES (?,?,?,?,?)');

    $option= ['cost'=>12,];

    //generate the hashed passwords
    $hashed= password_hash($password,PASSWORD_BCRYPT,$option);
    echo $hashed;

    // creates an array of value to be inserted into the database
    $dbarraay= array($this->generateClientId('CL'),$fname,$lname,$email,$hashed);

    //execute the insert in query and return an error when gotten
    if (!$stmt->execute($dbarraay)){
        $stmt= null;
        header('location: ../signupView.php');
        exit();
    }
    $stmt= null;
    return $dbarraay;

 }

 function selectBussines($businesstype){

    //creates a dictionary for access the prefix for the adminId and the table name to be inserted into the database
    $lowcase= strtolower($businesstype);
    $pre= array();
    if ($lowcase=='female hair service'){
       
             $pre= array('FH'=>'female_hair_services');    
        }
        elseif($lowcase=='mens cut'){
          
             $pre=array('MH'=>'male_hair_services'); 
        }
        elseif($lowcase=='tailor'){
            
             $pre=  array('TC'=>'tailor'); 
        }
        elseif($lowcase=='eatry'){
           
             $pre= array('ET'=>'eatry'); 
        }
        elseif($lowcase=='spa'){
            
             $pre= array('SP'=>'spa'); 
        }
        elseif($lowcase=='therapy'){
            
             $pre= array('TH'=>"therapy"); 
        }
        return $pre;

        
 }

 

 //insert the user into the database
 function setAdmin($busname,$email,$password,$address,$region,$businesstype){
   //access the Prefix for the business id
   $selBus= $this->selectBussines($businesstype);

   //access the key for the dictionary for the bussiness
   $arraykey= array_keys($selBus);
   $arraykeyindex= $arraykey[0];

   //access the value of the business type 
   $arrayvalues= $selBus[$arraykeyindex];
   echo $arrayvalues;

   $busid=$this->generateClientId($arraykeyindex);
    $connection= $this->db->connect();
    //insert in the general business table and the specific business table
    $stmtb= $connection->prepare("INSERT INTO business (business_id) VALUES (?);");
    $stmt= $connection->prepare("INSERT INTO `".$arrayvalues."` (business_id, business_name,password,email,address,region) VALUES (?,?,?,?,?,?);");

    


    
    $option= ['cost'=>12,];

    //generate the hashed passwords
    $hashed= password_hash($password,PASSWORD_BCRYPT,$option);
    echo $hashed;

    // creates an array of value to be inserted into the database
    $dbarraay= array($busid,$busname,$hashed,$email,$address,$region);

    $busarray=array($busid);
    //execute the insert in query and return an error when gotten
    if (!$stmtb->execute($busarray)||!$stmt->execute($dbarraay)){
        $stmt= null;
        $stmtb=null;
        header('location: ../signupView.php');
        exit();
    }
    
    //send the email

    //Define namespaces

    //Create instance of php mailler
    $mail = new PHPMailer();
    //set mailer to use smtp
    $mail->isSMTP();
    //define smtp
    $mail->Host="smtp.gmail.com";
    //enable smtp athentication
    $mail->SMTPAuth=true;
    //set type of encryption
    $mail->SMTPSecure="tls";
    //set gmail port
    $mail->Port="587";
    //set gmail password
    //set gmail username
    $mail->Username= "omieibibagshaw007@gmail.com";
    $mail->Password="Ibisobia00";
    //set email subject
    $mail->Subject="Your Account Id";
    //set Email body
    $mail->setFrom("omieibibagshaw007@gmail.com");
    //set email subject
    $mail->Body="Welcome to GH-Connect. This is your Id "." ".$busid.". Use this Id to login";
    //this takes in the email address of the person
    $mail->addAddress($email);
    //Send the email
    $mail->Send();
    //Close the smtp connecton
    $mail->smtpClose();

    $stmt= null;

    return $arrayvalues;

   

 }
// checks if the user already exist
 function checkUser($email){

    //creates the database connection
    $connection= $this->db->connect();
    $result='';

    //check if  the person email  is in the database
    $stmt= $connection->prepare('SELECT fname,lname FROM client WHERE email=?;');

    //execute the sql statement
    if (!$stmt->execute(array($email))){
        $stmt=null;
        header('location: ../MainInterface/SignUp.php?error=stmtfailed');
        exit();
    }

    // check if any row was returned from the database
    if ($stmt->rowCount()>0){
        $result=false;
    }
    else{
        $result= true;
    }
    return $result;

 }

 // check if the Admin exist in the database already
 function checkAdmin($email,$businesstype){
    $connection= $this->db->connect();
    $result='';
    $selBus= $this->selectBussines($businesstype);
    $arraykey= array_keys($selBus);
    $arraykeyindex= $arraykey[0];
    $arrayvalues= $selBus[$arraykeyindex];

    echo $arrayvalues;

   

    //check if the person email is in the database
    $stmt= $connection->prepare("SELECT business_name FROM `".$arrayvalues."` WHERE email=?;");
    
    if (!$stmt->execute(array($email))){
        $stmt=null;
        header('location: ../MainInterface/AdminSignup.php?error=stmtfailed');
        exit();
    }
     // check if any row was returned from the database
    if ($stmt->rowCount()>0){
        $result=false;
    }
    else{
        $result= true;
    }
    return $result;
 }


}
