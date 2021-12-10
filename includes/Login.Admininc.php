
<?php
/**  get the imformation from the 
 * User login form and pass it to 
 * the login method*/

if(isset($_POST["submit"])){
     $id=$_POST['id'];
     $pass=$_POST['password'];
     $busstype=$_POST['busstype'];

     echo $id;
     echo $pass;
     
   


      include "../Login/Login.AdminControl.php";

      $signup= new  LoginContr($id,$pass,$busstype);
      $signup->LoginUser();
       

      
      header('location: ../MainInterface/Admin-Dashboard.php?id= '.$id);
      
      
}

