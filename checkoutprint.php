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
<body  style="margin-right:200px;" >
    
<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];



if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'order placed already!';
    }else{
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'order placed successfully!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style>
    hr {
width: 110%;
height: 2px;
background-color: red;
margin-right: auto;
margin-left: auto;
margin-top: ;
margin-bottom: 5px;
border-width: 2px;
border-color: green;
}
.name{

margin-left: 0px;


}
.table{

margin-left: 20px;

}
</style>
</head>
<body style="margin-right:-200px;">
   






<section class="checkout"  style="margin-top: -40px;" >

<form action="" method="POST">

   
    <div class="" >
        <div class="inputBox">
           
            <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" placeholder="enter your name">
        </div>
        <div class="inputBox">
            
            <input type="number" name="number" min="0" placeholder="enter your number">
        </div>
        <div class="inputBox" >
           
            <input type="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" placeholder="enter your email" >
        </div>
        <div class="inputBox">
            
            <select name="method">
                <option value="cash on delivery">cash on delivery</option>
                <!-- <option value="credit card">credit card</option>
                <option value="paypal">paypal</option>
                <option value="paytm">paytm</option> -->
            </select>
        </div>
        <div class="inputBox">
          
            <input type="text" name="flat" placeholder="e.g. flat no.">
        </div>
        <div class="inputBox">
         
            <input type="text" name="street" placeholder="e.g.  streen name">
        </div>
        <div class="inputBox">
           
            <input type="text" name="city" placeholder="e.g. mumbai">
        </div>
        <div class="inputBox">
           
            <input type="text" name="state" placeholder="e.g. maharashtra">
        </div>
        <div class="inputBox">
            
            <input type="text" name="country" placeholder="e.g. india">
        </div>
        <div class="inputBox">
         
            <input type="number" min="0" name="pin_code" placeholder="e.g. 123456">
        </div>
    </div>

 


<table class="table" >
  
  <tr>
   
    <th colspan="">payment method</th>
    <th>Unit Cost</th>
    <th>subTotal</th>
    <th>Total</th>
  </tr>
 

 
</table>

<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']) ;
            
            $grand_total += $total_price;
    ?>    
   
   
<table >


</tr>




 
  <tr>
    <div>
    <div  class="name"style="text-align:left;"><?php echo $fetch_cart['name'] ?> </div>
    <div  style=";"><?php echo $fetch_cart['quantity']  ?></div>
    <div  style="margin-right:-500px;"><?php echo 'Rs'.$fetch_cart['price']; ?></div>
    <div  style="margin-right:-1100px;"><?php echo 'Rs'.$fetch_cart['price']; ?></div>
  
    </div>
    <hr>
  </tr>

  <tr>
  
</table>


<br> 
         

          </table>
          
          
   
   <?php
        }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
        
    ?>
    
    <table  style="margin-top:10px ; margin-right: 150px;  ">
  
  <tr >
   
     <td style=" text-align: right; "> subtotal</td>
     <td style=" text-align: center; ">Rs<?php echo $grand_total; ?>/-</td>
  </tr>
  
  <tr >
   
     <td style=" text-align: right; "> Discount (0%)</td>
     <td style=" text-align: center; ">Rs<?php echo $grand_total; ?>/-</td>
  </tr>
  <tr >
   
     <td style=" text-align: right; "> Total</td>
     <td style=" text-align: center; font-size: larger; color:red; ">Rs<?php echo $grand_total; ?>/-</td>
  </tr>


</table>
    
    <div class="grand-total">grand total : <span>Rs<?php echo $grand_total; ?>/-</span></div>




    
</section>
</form>

</section>

<?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>




          <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
    }
    ?>

<BR><BR><BR><BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR><BR><BR><BR>





<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
</body>
</html>