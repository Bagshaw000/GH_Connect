<?php


include "../database/db.php";
//calls the database class
$dbconnect= new database();

// call the connect method that creats the connection to the database
$connection =$dbconnect->connect();

// selects all the products from the database
$stmt= $connection->prepare("SELECT * FROM products ");

//executes the sql statament
$stmt->execute();

//get the data form the database as an array
$products =$stmt->fetchAll(PDO::FETCH_ASSOC);


?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href="app.cs">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Product CRUD</title>
  </head>
  <body>
    <h1>Product CRUD</h1>

    <p><a href="create.php" class="btn btn-success">Create Product</a>
  </p>

  <form action="">
    
  <div class="input-group mb-3">
  <input type="text" class="form-control"
   placeholder="Search for products" 
   name="search" value="<?php  $search ?>">
  <button class="btn btn-outline-secondary" type="submit" >Search</button>
</div>
</form>
    <table class="table">
  <thead>
  </thead>
  <tbody>
  <?php
  // Loop through all the products gotten from the database
  foreach($products as $i => $product): ?>
    <tr>

      <td><img src="<?php echo $product['products'] ?>" class="thumbimage">
    </td>
      <td><?php echo $product['products'] ?></td>
      
      <td>
     
     
      <a  href='../Admindashboard/Admindashboard.productUpdate.php? id=<?php echo $product['id']?>' type="hidden" name='id' value="<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
      
      </form>
      
      <form style="display:inline-block" method="POST" action="../includes/Admindashboard.Product.inc.php">
        <input type="hidden" name='Path' value="<?php echo $product['products'] ?>">
      <button name='delete' class="btn  btn-sm btn-outline-danger">Delete</button>
      </form>
      </td>
    </tr>

  <?php endforeach; ?>    
     
  </tbody>
</table>
  </body>
</html>