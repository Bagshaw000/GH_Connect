<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Login</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Login.css" media="screen">
<style> <?php include 'Login.css'?> </style>
<style> <?php include 'nicepage.css'?> </style>
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/Logo1.png",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Login">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
    <!-- Welcome image -->
    <section class="u-clearfix u-section-1" id="sec-e157">
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
          <div class="u-form u-form-1">
            <form action="../includes/Login.Userinc.php" method="POST">
                <h4 class='heading move'>Email</h4>
                <input type="email" name="email" class='Input move' required>
                <h4 class='heading move'>Password</h4>
                <input type="password" name="password"  class='Input move'required>
                <br>
                <button type="submit" name="submit" class='button move'><b>Login</b></button>
            </form>
            <a class='link' href='Signup.php' style='color:white'>Don't have an account?<b>Signup</b></a>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>