
<?php

/**  get the imformation from the 
 * User login form and pass it to 
 * the login method*/
if(isset($_POST["submit"])){
     $email=$_POST['email'];
     $pass=$_POST['password'];
     

     


      include "../Login/Login.UserControl.php";

      $login= new LoginContrUser($email,$pass);

      $login->LoginUser();

      header('location: ../MainInterface/dashboard.php?error=none');
 }