<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <style>
      

   </style>
</head>
<body>
   
</body>
</html>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header rounded border border-dark  " style="background-color:black;";>

   <div class="flex">

      <a href="admin_page.php" class="logo"> <span style="color:white;";>Admin </span><span style="color:#f39c12;">Panel</span></a>

      <nav class="navbar" >
         <a style="color:white;"; href="admin_page.php">Home</a>
         <a href="admin_products.php"> <span style="color:white;";>Products </span></a>
         <a  href="admin_orders.php"> <span style="color:white;";>Orders </span></a>
         <a  href="admin_users.php"> <span style="color:white;";>Users</span></a>
         <a style="color:white;"; href="admin_contacts.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div  id="user-btn" class="fas fa-user"></div>
         
         <a href="home.php" class="logo" style="color:gold"><img src="img/logo_155x_2x_36903a57-eff3-46a2-b04e-c7a9465ece1d_medium.png" style="  width:130px; margin: 0px 0px 0px 110px;
"></a>


      </div>
      
      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a> </div>
      </div>

   </div>

</header>