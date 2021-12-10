<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="INTUITIVE">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>SignUp</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="SignUp.css" media="screen">
<style> <?php include 'SignUp.css'?> </style>
<style> <?php include 'nicepage.css'?> </style>

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/Logo1.png",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="SignUp">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
      <!--User SignUp Form -->
    <header class="u-clearfix u-header u-header" id="sec-876d">
      <div class="u-align-left u-clearfix u-sheet u-sheet-1"></div>
    </header>
    <section class="u-clearfix u-section-1" id="sec-b769">
      <h1 class="u-align-center u-custom-font u-text u-text-default u-text-1">&nbsp;&nbsp;</h1>
      <div class="u-border-3 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-15 u-shape-round u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <h3 class="u-align-center u-custom-font u-text u-text-default u-text-2">Create Account</h3>
          <div class="u-form u-form-1">

          <form action="../includes/signup.Userinc.php" method="POST">
            <h4 class='move heading'>Firstname</h4>
            <input type="text" name="fname"  class='Input move' required>
            <h4 class='move heading'>Lastname</h4>
            <input type="text" name="lname"  class='Input move' required>
            <h4 class='move heading'>Email</h4>
            <input type="email" name="email"  class='Input move' required>
            <h4 class='move heading'>Password</h4>
            <input type="password" name="password" id='password' class='Input move'>
            <p id='busnameError'>Please enter a valid Password<br>
                 Must have a uppercase<br>
                Must have a lowercase<br>
                Must have a number<br>
                Must have a special character<br>
                Must have atleast 8 digits</p>
                <br></p>
            
            <h4 class='move heading'>Confirm Password</h4>
            <input type="password" name="confirmpass" id='conpassword' class='Input move'>
            <p id='Error'>Please enter a valid Password<br>
                 Must have a uppercase<br>
                Must have a lowercase<br>
                Must have a number<br>
                Must have a special character<br>
                Must have atleast 8 digits</p>
                <br></p>
            <br>
            <button type="submit" name="submit" class='button move'><b>Sign up</b></button>
          </form>
          <script src="AdminSignupRegex.js"></script>
          <a href='Login.php' style='color:white;font-family:Poppins;margin-left:50px'>Already have an account?<b>Login</b></a>
          </div>
        </div>
      </div>
      <img class="u-expanded-width-xs u-image u-image-default u-image-1" src="images/undraw_Web_devices_re_m8sc-removebg-preview.png" alt="" data-image-width="621" data-image-height="402">
      <p class="u-align-left u-text u-text-default u-text-3">&nbsp;&nbsp;</p>
      <h3 class="u-align-left u-custom-font u-text u-text-default u-text-4">&nbsp;&nbsp;</h3>
      <h1 class="u-align-left u-text u-text-custom-color-1 u-text-default u-title u-text-5"> Sign Up </h1>
    </section>
    
    
    
  </body>
</html>