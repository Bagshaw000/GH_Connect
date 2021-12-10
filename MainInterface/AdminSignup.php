<?php  
session_start();
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>AdminSignup</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <style><?php include 'AdminSignup.css' ?> </style>
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/Logo1.png",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="AdminSignup">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <!-- Admin Signup Page -->
    <section class="u-clearfix u-section-1" id="sec-26fc">
      <div class="u-border-3 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-15 u-shape-round u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h3 class="u-align-center u-custom-font u-text u-text-default u-text-1">Create Account</h3>
          <div class="u-form u-form-1">

            <form action="../includes/signup.Admininc.php" method="POST">
                <!-- Business name fields -->
                <h4 class='head'>Business name</h4>
                <input type="text" name="busname" placeholder="Business name" id='busniessname' class='Input dropdown' required>
                <br>
                

                <!-- Email field -->
                <h4 class='space'>Email</h4>
                <input type="email" name="email" placeholder="Email" class='Input dropdown' required>
                <br>

                <!-- Business type field -->
                <h4 class='space'>Business type</h4>

                <!-- Drop down For Business type -->
                <select name='dropdown' class='Input2 dropdown'>
                    <option value="tailor">Tailor</option>
                    <option value="mens cut">Men's</option>
                    <option value="female hair service">Saloon</option>
                    <option value="eatry">Eatry</option>
                    <option value="therapy">Therapy</option>
                    <option value="spa">Spa</option>
                </select>

                <!-- Drop down For Business Region -->
                <h4 class='space'>Region</h4>
                <select name="region" id=""  class='Input2 dropdown'>
                    <option value="Greater Accra">Greater Accra</option>
                    <option value="Eastern">Eastern</option>
                    <option value="Ahafo">Ahafo</option>
                    <option value="Ashanti">Ashanti</option>
                    <option value="Bono">Bono</option>
                    <option value="Bono East">Bono East</option>
                    <option value="Central">Central</option>
                    <option value="North East">North East</option>
                    <option value="Northern">Northern</option>
                    <option value="Oti">Oti</option>
                    <option value="Savannah">Savannah</option>
                    <option value="Upper East">Upper East</option>
                    <option value="Upper West">Upper West</option>
                    <option value="Volta">Volta</option>
                    <option value="Western North">Western North</option>
                    <option value="Western">Western</option>
                </select>

                <!-- Address Field -->
                <br>
                <h4 class='space'>Address</h4>
                <input type="text" name="address" placeholder="Address" class='Input dropdown' required>
                <br>

                <!-- Password Field -->
                <h4 class='space'>Password</h4>
                <input type="password" name="password" placeholder="Password" id='password' class='Input2 dropdown'>
                <p id='busnameError'>Please enter a valid Password<br>
                 Must have a uppercase<br>
                Must have a lowercase<br>
                Must have a number<br>
                Must have a special character<br>
                Must have atleast 8 digits
              </p>
                <!-- Confirm Password Field -->
                <h4 class='space'>Confirm Password</h4>
                <input type="password" name="confirmpass" placeholder="Confirm password" id='conpassword' class='Input2 dropdown'>
                <p id='Error'>Please enter a valid Password<br>
                 Must have a uppercase<br>
                Must have a lowercase<br>
                Must have a number<br>
                Must have a special character<br>
                Must have atleast 8 digits</p>
                <br>
                <!-- Alert For insertion  -->
                <?php
                if(isset($_SESSION['checkPassword'])){
                  ?>
                      <div class="alert alert-danger" role="alert">
                      <?php
                      echo $_SESSION['checkPassword'];?>
                    </div>
                  <?php
                
                unset( $_SESSION['checkPassword']) ;}
                ?>
                <button type="submit" name="submit" class='space button'><b>Sign up</b></button>
                <br>
                <?php
                  $_SESSION['CheckEmail']='Id sent to your Email';
                ?>
                <a href='Login-Admin.php' style='color:white; font-family:Poppins'>Already have an account? <b>Login</b></a>
         </form>
                
         <script src="AdminSignupRegex.js"></script>
         
          </div>
          
        </div>
      </div>
      <img class="u-expanded-width-xs u-image u-image-default u-image-1" src="images/undraw_Web_devices_re_m8sc-removebg-preview.png" alt="" data-image-width="621" data-image-height="402">
      <p class="u-align-left u-text u-text-default u-text-2">&nbsp;&nbsp;</p>
      <h1 class="u-align-center u-custom-font u-text u-text-default u-text-3">&nbsp;&nbsp;</h1>
      <h1 class="u-align-left u-hidden-lg u-text u-text-custom-color-1 u-text-default u-title u-text-4"> Sign Up </h1>
      <h3 class="u-align-left u-custom-font u-text u-text-default u-text-5">&nbsp;&nbsp;</h3>
    </section>
  </body>
</html>
