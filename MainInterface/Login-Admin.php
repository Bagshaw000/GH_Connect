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
    <title>Login Admin</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <style> <?php include 'Login-Admin.css'?> </style>
    <style> <?php include 'nicepage.css'?> </style>
<link rel="stylesheet" href="Login-Admin.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
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
    <meta property="og:title" content="Login Admin">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <!-- Welcome image -->
    <section class="u-clearfix u-section-1" id="sec-d674">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-custom-color-1 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <div class="u-container-style u-custom-color-2 u-group u-radius-8 u-shape-round u-group-2">
              <div class="u-container-layout u-container-layout-2">
                <p class="u-text u-text-custom-color-1 u-text-default u-text-1">Welcome</p>
                <img class="u-image u-image-default u-image-1" src="images/undraw_Social_interaction_re_dyjh-removebg-preview.png" alt="" data-image-width="579" data-image-height="431">
              </div>
            </div>
          </div>
        </div>

<!-- The login Form -->
        <div class="u-container-style u-custom-color-1 u-group u-radius-8 u-shape-round u-group-3">
          <div class="u-container-layout u-container-layout-3">
            <p class="u-text u-text-default u-text-2">Login</p>
            <!-- Alert For insertion  -->
            <?php
            if(isset($_SESSION['CheckEmail'])){
              ?>
                  <div class="alert alert-light" role="alert">
                  <?php
                  echo $_SESSION['CheckEmail'];?>
                </div>
              <?php
              
            unset( $_SESSION['CheckEmail']) ;}
            ?>
            <div class="u-form u-form-1">
           
            <form action="../includes/Login.Admininc.php" method="POST">
                <input type="text" class='input' name="id" placeholder="Id" required>
                <br>
             
                <input type="password" name="password" class=' input' placeholder="Password" required>
                <br>
                <select name='busstype' class='optioncolor'>
                <option value="tailor">Tailor</option>
                  <option value="male_hair_service">Men's</option>
                  <option value="female_hair_service">Saloon</option>
                  <option value="eatry">Eatry</option>
                  <option value="therapy">Therapy</option>
                  <option value="spa">Spa</option>
                </select>
                <br>
                <button type="submit" name="submit" class='submit'>Login</button>
            </form> 
                
               <a class='link' href='AdminSignup.php' style='color:white'>Don't have an account?<b>Signup</b></a>

            </div>
          </div>
        </div>
      </div>
    </section>
    
   
  </body>
</html>