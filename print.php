<!DOCTYPE html>
<html lang="en" >
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

tr:nth-child(even) {
  background-color: #dddddd;
}

table, td, th {
  border: 1px solid black;
}

  </style>
  
  
  
  
  
  <script>
  function Getprint()
{

   window.print();

}

  </script>
  </head>
<body >

<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_order'])){
   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
 
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
   $message[] = 'payment status has been updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>


<section class="placed-orders "   >

   <h1 class="title" ></h1>

   <div class="box-container">

      <?php
      
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box " style="text-align: left;">
      
      <table >
      <div class="brand-logo"  style="float: left; margin-left:30px;" >
  <img src="lakme product\Lkm1_1_47aec8f4-69ca-4d80-be5f-b941bc1bf140_155x.webp" alt="Paris" width="60" height="60" style="margin-top: 20px; margin-left:20px; ">
  </div>
  <br>

  <h1 style="text-align: center; font-size:40px;;">  Lakme cosmetics</h1>

      <h1 class="title border" bg-color="black" style="background-color:#FF1493; text-align:center; border: 1px solid black;">Lakme Invoice </h1><img src="lakme img/qrcode.png" class="" style="float:right; margin-right:100px;height:40px; width:130px;" alt="...">
      <h4 class="title">Final Details For Order <span style="color:#00D91D;">#17293-38373</span></h4>
         <p><b> user id :</b> <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p><b> placed on :</b> <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> <b>name :</b> <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> <b>number :</b> <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p><b> email :</b> <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p><b> address :</b> <span><?php echo $fetch_orders['address']; ?></span> </p>
        
          
            
          </form>




          <table >


</tr>




  <tr>
    <th>Item</th>
    <th>payment method</th>
    <th>Unit Cost</th>
    <th>Total</th>
  </tr>
  <tr>
    <td><?php echo $fetch_orders['total_products']; ?></td>
    <td><?php echo $fetch_orders['method']; ?></td>
    <td>Rs<?php echo $fetch_orders['total_price']; ?>/-</td>
    <td>Rs<?php echo $fetch_orders['total_price']; ?>/-</td>
  </tr>

  <tr>
  
</table>

<table  style="margin-top:10px ; margin-right: 150px;  ">
  
   <tr >
    
      <td style=" text-align: right; "> subtotal</td>
      <td style=" text-align: center; ">Rs<?php echo $fetch_orders['total_price']; ?>/-</td>
   </tr>
   
   <tr >
    
      <td style=" text-align: right; "> Discount (0%)</td>
      <td style=" text-align: center; ">Rs<?php echo $fetch_orders['total_price']; ?>/-</td>
   </tr>
   <tr >
    
      <td style=" text-align: right; "> Total</td>
      <td style=" text-align: center; font-size: larger; color:red; ">Rs<?php echo $fetch_orders['total_price']; ?>/-</td>
   </tr>


</table>
<br> <br> <br> <br> <br>
          <button type="button" class="btn btn-danger" style="background-color: #0074d9; color:white; width:80px; height:30px;" onclick="Getprint()" >Print</button>
         
          

          </table>
<br> <br>
<p style="float:right; ">
Authorization signature</p>


          
          <hr>
          <br>  <br> 
             
             <p> <img src="https://www.freepnglogos.com/uploads/signature-png/gadennis-signature-image-png-27.png" class="" style="float:right; height:40px; width:130px;" alt="...">
 </p><br> <br>

           
          
         <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> 
      </div>
      
      <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>








</body>
</html>