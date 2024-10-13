
<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

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
@media print
{

.btn
{

   display:none;
}

.bil
{

display:none;
}



}


@media screen 
{
    
    .otr
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


hr {
width: 100%;
height: 1px;
background-color:black;
margin-right: auto;
margin-left: auto;
margin-top: ;
margin-bottom: ;
border-width: 2px;
border-color: green;
}
.name{

margin-left: 0px;


}
.table{

margin-left: 0px;

}
  </style>
  
  
  
  
  
  <script>
  function Getprint()
{

   window.print();

}

  </script>
</head>
<body>
 <span class="bil"> 
<?php @include 'header.php'; ?></span>  

<section class="heading btn">
    <h3>checkout order</h3>
    <p> <a href="home.php">home</a> / checkout </p>
</section>

<section class="display-order bil">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']) ;
            $x = 100-$fetch_cart['quantity'];
            echo $x."<br/>";
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> <span>(<?php echo 'Rs'.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span> </p>
    <?php
        }
        }else{
            echo '<p class="empty">your cart is empty</p>';
        }
    ?>
    
   </section>
   <div class="brand-logo otr"  style="float: left; margin-left:30px;" >
  <img src="lakme product\Lkm1_1_47aec8f4-69ca-4d80-be5f-b941bc1bf140_155x.webp" alt="Paris" width="60" height="60" style="margin-top: 20px; margin-left:20px; ">
  </div>
  <h1 class="otr" style="text-align: center; font-size:40px;;">  Lakme cosmetics</h1>
  <br> <br> <br>
  <h1 class="title border otr" bg-color="black" style="background-color:#FF1493; text-align:center; border: 1px solid black;">Lakme Invoice </h1><img src="lakme img/qrcode.png" class="otr" style="float:right; margin-right:100px;height:40px; width:130px;" alt="...">
      <h6 class="title otr">Final Details For Order <span style="color:#00D91D;">#17293-38373</span></h6>
     

<section class="checkout">

    <form action="" method="POST">

        <h3 class="bil">place your order</h3>

        <div class="flex">
            <div class="inputBox">
                <span  >your name :</span>
                <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" placeholder="enter your name">
            </div>
            <div class="inputBox">
                <span   >your number :</span>
                <input type="number" name="number" min="0" placeholder="enter your number">
            </div>
            <div class="inputBox" >
                <span   >your email : </span>
                <input type="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" placeholder="enter your email" >
            </div>
            <div class="inputBox">
                <span  >payment method :</span>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                    <!-- <option value="credit card">credit card</option>
                    <option value="paypal">paypal</option>
                    <option value="paytm">paytm</option> -->
                </select>
            </div>
            <div class="inputBox">
                <span  >address line 01 :</span>
                <input type="text" name="flat" placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span   >address line 02 :</span>
                <input type="text" name="street" placeholder="e.g.  streen name">
            </div>
            <div class="inputBox">
                <span >city :</span>
                <input type="text" name="city" placeholder="e.g. mumbai">
            </div>
            <div class="inputBox">
                <span  >state :</span>
                <input type="text" name="state" placeholder="e.g. maharashtra">
            </div>
            <div class="inputBox">
                <span   >country :</span>
                <input type="text" name="country" placeholder="e.g. india">
            </div>
            <div class="inputBox">
                <span   >pin code :</span>
                <input type="number" min="0" name="pin_code" placeholder="e.g. 123456">
            </div>
        </div>
        

        

<table class="table otr" >
  
  <tr>
   
    <th colspan="" style="font-size:20px;">product name</th>
    <th style="font-size:20px;">quantity</th>
    <th style="font-size:20px;">subTotal</th>
    <th style="font-size:20px;">Total</th>
  </tr>
 

 
</table>

<section class="display-order otr">
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
    <div class="otr">
    <div  class="name"style="text-align:left; font-size:12px;"><b><?php echo $fetch_cart['name'] ?></b> </div>
    <b><div  style="font-size:12px;margin-top:-15px;"><?php echo $fetch_cart['quantity']  ?></div>
    <div  style="margin-right:-500px; font-size:12px;margin-top:-15px; "><?php echo 'Rs'.$fetch_cart['price']; ?></div>
    <div  style="margin-right:-900px; font-size:12px; margin-top:-15px;"><?php echo 'Rs'.$fetch_cart['price']; ?></div></b>
  
    </div>
    <br><br>
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
    
    <table class="otr"  style="margin-top:10px ; margin-right: 150px;  ">
  
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
    
    <div class="grand-total" style="float:right; margin-right:100px;">grand total : <span>Rs<?php echo $grand_total; ?>/-</span></div>



    <br> <br><br> <br><br> <br>
    <h1 style="float:right;font-size:20px; ">
Authorization signature</h1>


          
          
          <br>  <br> 
             
             <img src="img/gadennis-signature-image-png-27.png" class="" style="float:right; height:40px; width:130px; margin-right:-200px;" alt="...">
 <br> <br>

           
   <br> <br> <br> <br>
</section>
<input type="submit" name="order" value="order now" class="btn">
<button></button>
<button type="button" class="btn btn-danger" style="background-color: #0074d9; color:white; width:100px; height:40px;" onclick="Getprint()" >Print</button>
  
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
  
          

    </form>

</section>





<span  class="bil">
<?php @include 'footer.php'; ?></span>

<script src="js/script.js"></script>

</body>
</html>