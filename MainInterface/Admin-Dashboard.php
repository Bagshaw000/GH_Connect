<?php
session_start();
include '../database/db.php';

//Gets the id form the url
$var=$_GET['id'];

//removes all the space from the id gotten
$newvar= str_replace(' ','',$var);

//Creates a database connection
$dbconnect= new database();

//SQL query
$connection=$dbconnect->connect();
$stmt= $connection->prepare("SELECT * FROM products WHERE business_id=?");
$stmtb=$connection->prepare("SELECT * FROM review WHERE business_id=?");

$id= array($newvar);


//executes the sql statament
$stmt->execute($id);
$stmtb->execute($id);

//get the data form the database as an array
$products =$stmt->fetchAll(PDO::FETCH_ASSOC);
$review= $stmtb->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <style><?php include'Admin-Dashboard.css'?></style>


    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src='Admindashboard.js'></script>
    <script src='AdminDelete.js'></script>
    
    <script type="application/ld+json">
    {
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1",
		"logo": "images/Logo1.png",
		"sameAs": []
    }
    </script>

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Admin Dashboard">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>

<!--Nav bar of the page  -->

<body class="u-body">
    <ul class="nav  justify-content-end">
      <li class="nav-item">
        <a ><img id='Logo' src="images/Logo1.png" alt=""></a>
      </li>
      <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Close
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li>
                <a class="dropdown-item" href="Home.php">Logout</a>
              </li>
            </ul>
          </div>
      </li>
    </ul>

<!-- The page title -->
    <label id='head'>Admin Portal</label>
    <!-- Alert For insertion  -->
    <?php
    if(isset($_SESSION['InsertStatus'])){
      ?>
          <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['InsertStatus'];?>
        </div>
      <?php
    
    unset( $_SESSION['InsertStatus']) ;}
    ?>

  <?php
    if(isset($_SESSION['ProductDelete'])){
      ?>
          <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['ProductDelete'];?>
        </div>
      <?php
    
    unset( $_SESSION['ProductDelete']) ;}
    ?>
<!-- Alert For insertion  -->
<?php
    if(isset($_SESSION['UpdateProduct'])){
      ?>
          <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['UpdateProduct'];?>
        </div>
      <?php
    
    unset( $_SESSION['UpdateProduct']) ;}
    ?>
    <!-- The add icon and Product page -->
    <div class='flex1'>
      <p id='title'>Products</p>
     <div class='container mt-5'>
    
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <img class='button' src="images/plus.png" alt="">
        </button>
     </div>
    </div>

      <!-- Modal -->
      <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form  method="POST"  id='form' class='form' action='' enctype="multipart/form-data">
                    <div class="form-group mb-3">
                      <div class="mb-3">
                          <label >Product Image</label>
                          <input type="file" name="image" id='image' class="form-control">
                      </div>

                      <div class="mb-3">
                      
                        <input type="hidden" name="id" class="form-control" id ='title' value="<?php echo $newvar ?>">
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-primary" id='btn' name="admin"> Submit</button>
                  </form>
                  
               </div>
                  
          </div>
        </div>
      </div>
        
<!-- The Product menu -->
      <div class='flex'>
      <?php foreach($products as $i => $item): ?>
      

        <div class='imagecontainer'>
          <img src="../Admindashboard/<?php echo $item['products'] ?>" alt="" class='image'></div>
          <div > 
            <a  href='../Admindashboard/Admindashboard.productUpdate.php? id=<?php echo $item['id']?>&var=<?php echo $newvar?>
              ' type="hidden" name='id' 
              value="<?php echo $product['id'] ?>" class="btn"> <img class='button1' src="images/refresh.png" alt="">
            </a> 

              <form style="display:inline-block" method="POST"  class='form' action="">
                  <input type="hidden" name='Path' id='Path' value="<?php echo $item['products'] ?>">
                  <button type='submit' name='delete' class="btn"><img class='button1' src="images/x-mark.png" alt=""></button>
              </form>
          </div>
        

      
      <?php endforeach; ?>
      </div>

        
      <div class= "scroll">
      
        <label id='Name'>Client Name</label>
        <label id='Review'>Review</label>
    

      <?php
      foreach($review as $i => $item): ?>
        
        <table class='table'>
          
        <td id='dname'> <?php echo $item['name'] ?> </td>
        <td id='dreview'> <?php echo $item['review'] ?></td>
        
      
      

       </table>
          
            
      <?php endforeach; ?>

                
        

       </div>
  
          
    
   
  </body>
</html>