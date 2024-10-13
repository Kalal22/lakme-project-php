<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
 
<?php @include 'header.php'; ?>

<section class="heading"  style="background-color:black;";>
    <h3>your orders</h3>
    <p> <a href="home.php">home</a> / order </p>
</section>
<!-- or-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card-stepper {
z-index: 0
}

#progressbar-2 {
color: #455A64;
}

#progressbar-2 li {
list-style-type: none;
font-size: 13px;
width: 33.33%;
float: left;
position: relative;
}

#progressbar-2 #step1:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
margin-left: 0px;
padding-left: 0px;
}

#progressbar-2 #step2:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
}

#progressbar-2 #step3:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
margin-right: 0;
text-align: center;
}

#progressbar-2 #step4:before {
content: '\f111';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
margin-right: 0;
text-align: center;
}

#progressbar-2 li:before {
line-height: 37px;
display: block;
font-size: 12px;
background: #c5cae9;
border-radius: 50%;
}

#progressbar-2 li:after {
content: '';
width: 100%;
height: 10px;
background: #c5cae9;
position: absolute;
left: 0%;
right: 0%;
top: 15px;
z-index: -1;
}

#progressbar-2 li:nth-child(1):after {
left: 1%;
width: 100%
}

#progressbar-2 li:nth-child(2):after {
left: 1%;
width: 100%;
}

#progressbar-2 li:nth-child(3):after {
left: 1%;
width: 100%;
background: #c5cae9 !important;
}

#progressbar-2 li:nth-child(4) {
left: 0;
width: 37px;
}

#progressbar-2 li:nth-child(4):after {
left: 0;
width: 0;
}

#progressbar-2 li.active:before,
#progressbar-2 li.active:after {
background: #20FF3A;
}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<section class="vh-100  " style="margin-top:-150px;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 ">
        <div class="card card-stepper text-black border border-dark" style="border-radius: 16px;">

          <div class="card-body p-5">

            <div class="d-flex justify-content-between align-items-center mb-5">
              <div>
                <h5 class="mb-0">ON THE WEY <span class="text-primary font-weight-bold"></span></h5>
              </div>
              <div class="text-end">
                <p class="mb-0">Expected Arrival <span><?php echo date("d-m-Y"); ?></span></p>
                <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
              </div>
            </div>

            <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
              <li class="step0 active text-center" id="step1"></li>
              <li class="step0 active text-center" id="step2"></li>
              <li class="step0 active text-center" id="step3"></li>
              <li class="step0 text-muted text-end" id="step4"></li>
            </ul>

            <div class="d-flex justify-content-between">
              <div class="d-lg-flex align-items-center">
                <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Processed</p>
                </div>
              </div>
              <div class="d-lg-flex align-items-center">
                <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Shipped</p>
                </div>
              </div>
              <div class="d-lg-flex align-items-center">
                <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">En Route</p>
                </div>
              </div>
              <div class="d-lg-flex align-items-center">
                <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                <div>
                  <p class="fw-bold mb-1">Order</p>
                  <p class="fw-bold mb-0">Arrived</p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>

<!--or-->





<section class="placed-orders" style="margin-top:-190px;">

    <h1 class="title">placed orders</h1>


    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> total price : <span>Rs<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
        <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
    }
    ?>
    </div>

</section>







<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>