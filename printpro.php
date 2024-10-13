<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $stock = mysqli_real_escape_string($conn, $_POST['stock']);
  
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, stock, image) VALUES('$name', '$details', '$price', '$stock', '$image')") or die('query failed');

      if($insert_product){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folter);
            $message[] = 'product added successfully!';
         }
      }
   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
   header('location:admin_products.php');

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
@media print
{

.btn
{

   display:none;
}




}



.brand-logo {
  height: 100px;
  width: 100px;
  background: url("");
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
  background-repeat:no-repeat;
 background-color: black;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
    
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  
}
th{

    background-color: #dddddd;

}

tr:nth-child(even) {
 
}

table, td, th {
  border: 1px solid black;
  
}


@media print
{

.btn
{

   display:none;
}




}
  </style>
   </style>
  
  
  
  
  
  <script>
  function Getprint()
{

window.print();

}

  </script>
</head>
<body>
    
<h1 class="title border" bg-color="black" style="background-color:#84D534; text-align:center; border: 1px solid black;">products details </h1> 
  

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      
   


   <table >


</tr>




  <tr style="border: 1px solid black;">
   
    <th>Name</th>
    <th>Price</th>
    <th>stock</th>
  </tr>
  <tr >
    
    <td><?php echo $fetch_products['name']; ?></td>
    <td style="color:red; ">Rs<?php echo $fetch_products['price']; ?>/-</td>
    <td style="color:green; "><?php echo $fetch_products['stock']; ?></td>
    

  </tr>

  <tr>
  
</table>
<?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   <br> <br> 

   <button type="button" class="btn btn-danger" style="background-color: #0074d9; color:white; width:80px; height:30px;" onclick="Getprint()" >Print</button>
          
          
          
          
          
                    
                    <hr>
                    <br> <br> <br> <br> <br> <br>
                    <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> 
              
</section>
</body>
</html>