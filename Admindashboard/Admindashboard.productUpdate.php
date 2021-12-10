<?php
session_start();

include "../database/db.php";

//creates an instance of the database class
$dbconnect= new database();

// call the connect method from the database calss
$connection= $dbconnect->connect();

// sellects the products from the products table with that sepcific id
$stmt= $connection->prepare('SELECT * FROM products WHERE id= :id;');
$id= $_GET['id'];
$var= $_GET['var'];


//binds the value from the database to the varaible id so we can use it later on
$stmt->bindValue(':id',$id);

//executes the query statment
$stmt->execute();


// access the data goten from the database as an associative array
$product= $stmt->fetch(PDO::FETCH_ASSOC);

//if we click the update button then it does the update functionality
if (isset($_POST['update'])){

  //Takes the new files you uploaded
    $image= $_FILES['image'];
    $imagePath=$product['products'];

   

  //check if the image is in the "productImage" directory
  //If not then make the directory"productImage"
    if (!is_dir('productImage')){
        mkdir("productImage");
    }

    // this checks the image name and the temporary name from xampp
    if($image && $image['tmp_name']){

      //unlinks the image gotten from the database to create space for new insertion
        if($product['products']){
            unlink($product['products']);
        }

        //Generates a random imagpath with the randomstring function created
        $imagePath='productImage/'.randomString(8).'/'.$image['name'];

        //make the image path a directory
        mkdir(dirname($imagePath));

          //move to the temporary name given by xammp to the image path
          move_uploaded_file($image['tmp_name'],$imagePath);
    }

    //sql statement to update the image
    $stmt=$connection->prepare("UPDATE products SET products=:image WHERE id=:id");
    $stmt->bindValue(':image',$imagePath);
    $stmt->bindValue(':id',$id);

    
    //executes the sql statement
    $stmt->execute();

    //get the new update data form the database as an array
    $product= $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['UpdateProduct']='Succesfully Updated Product';
    header('location: ../MainInterface/Admin-Dashboard.php?id='.$var);

    
    
}
  //this function generates the random image path
  function randomString($n){

    //list of character to pick from to form the path string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str='';

    //loop through to pick the string and append them to a varaible
    for($i=0;$i<$n; $i++){
    $index= rand(0,strlen($characters) - 1);
    $str .= $characters[$index];
      }
      
      //retuns the  string
      return $str;
  }

     

?>

<?php 

// creates a database connection
 $dbconnect= new database();
 $connection= $dbconnect->connect();

 //selects  all product form the database
 $stmt = $connection->prepare('SELECT * FROM products ');
 $prodArray= array();
 $stmt->execute();
 $product=$stmt-> fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href="AdminProduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Product CRUD</title>
  </head>
  <body class='body'>
  
<div class='Container'>
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb">
    <label class='head' >Upload Image</label>
    <input type="file" name="image" class="form-control">
  </div>

  <div class="mb-3">
    <input type="hidden" name="id" class="form-control" value="<?php  echo $product['business_id'] ?>">
  </div>


  
  <button type="submit" name ='update' class="button">Submit</button>
</form>
  
</div>
  </body>
</html>
