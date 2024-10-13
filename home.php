<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<link rel="stylesheet" href="style.css">
   <!-- Bootstrap link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap link end  -->
     <!-- Bootstrap! code link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <!-- Bootstrap! code end  -->

<title>Title</title>
</head>
<body>
        <!-- Bootstrap! code link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <!-- Bootstrap! code end  -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>





<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   
   $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist_numbers) > 0){
       $message[] = 'already added to wishlist';
   }elseif(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{
       mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to wishlist';
   }

}

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart';
   }else{

       $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

       if(mysqli_num_rows($check_wishlist_numbers) > 0){
           mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       }

       mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
       $message[] = 'product added to cart';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
  </head>
<body>
   
<?php @include 'header.php'; ?>





   <!-- Bootstrap! code start  -->
   <div id="carouselExampleIndicators " class="carousel slide " data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

 


  <div id="carouselExampleControls" class="carousel slide  rounded border border-white border-4 " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active  rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://www.coletteandyvonne.com/wp-content/uploads/2019/02/LFW_feature_opening.jpg" alt="First slide">
    </div>
    <div class="carousel-item  rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://www.coletteandyvonne.com/wp-content/uploads/2019/02/LFW_slider_08.jpg" alt="Second slide">
    </div>
    <div class="carousel-item rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://www.coletteandyvonne.com/wp-content/uploads/2019/02/LFW_slider_07.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
</div>
<br>
<br>
<br>






<br>
 <!-- Bootstrap! code End  -->

   




 

<!-- Bootstrap! code start  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Document</title>
  <style>
    body {
    margin-top:20px;
    font-family: 'Montserrat',sans-serif;
}
/* this is just for the demo */





.panel-heading:hover {
    cursor:pointer;
}
.panel-heading {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;    
}

.side-tab:hover {
        cursor: pointer;
    }
    .panel.panel-default {
        border: none;
        box-shadow: none !important;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        
    }
    .panel-heading {
        border: none;
        background-color: black;
        color: white;
    
    }
    .panel-body {
        background-color: black;
    }
    .panel-title {
        font-weight: 400;
        
    }

/*----------------------------------
    Macbook pro mockup from:
    http://jaredhardy.com/minimal-devices/
    
----------------------------------*/

.md-macbook-pro {
  display: block;
  width: 55.3125em;
  height: 31.875em;
  font-size: 13px;
  margin: 0 auto;
 

}
.md-macbook-pro .md-lid {
  width: 45em;
  height: 30.625em;
  overflow: hidden;
  margin: 0 auto;
  position: relative;
  border-radius: 1.875em;
  border: solid 0.1875em #cdced1;
  background: #131313;
}
.md-macbook-pro .md-camera {
  width: 0.375em;
  height: 0.375em;
  margin: 0 auto;
  position: relative;
  top: 1.0625em;
  background: #000;
  border-radius: 100%;
  box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.25);
}
.md-macbook-pro .md-camera:after {
  content: "";
  display: block;
  width: 0.125em;
  height: 0.125em;
  position: absolute;
  left: 0.125em;
  top: 0.0625em;
  background: #353542;
  border-radius: 100%;
}
.md-macbook-pro .md-screen {
  width: 45.25em;
  height: 25.375em;
  margin: 0 auto;
  position: relative;
  top: 2.0625em;
  
  background: #fff;
  overflow: hidden;
}
.md-macbook-pro .md-screen img {
  width: 100%;
 
}
.md-macbook-pro .md-base {
  width: 100%;
  height: 0.9375em;
  position: relative;
  top: -0.75em;
  background: #c6c7ca;
}
.md-macbook-pro .md-base:after {
  content: "";
  display: block;
  width: 100%;
  height: 0.5em;
  margin: 0 auto;
  position: relative;
  bottom: -0.1875em;
  background: #b9babe;
  border-radius: 0 0 1.25em 1.25em;
}
.md-macbook-pro .md-base:before {
  content: "";
  display: block;
  width: 7.6875em;
  height: 0.625em;
  margin: 0 auto;
  position: relative;
  background: #a6a8ad;
  border-radius: 0 0 0.625em 0.625em;
}
.md-macbook-pro.md-glare .md-lid:after {
  content: "";
  display: block;
  width: 50%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  border-radius: 0 1.25em 0 0;
  background: -webkit-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -moz-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -o-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: linear-gradient(53deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
}









  </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<div  class="rounded mt-4  border-1" style="text-align: center;  background-image: url('https://i.ytimg.com/vi/eKiNxcPD7ys/maxresdefault.jpg');
            background-repeat:no-repeat;
background-attachment:fixed;;
            height: 50vh;  width:9000px; background-position:  center">

</div>
<br>
 

<div  style="text-align: center; ">
<h1 class="rounded-pill " style="background-image: url('img/Screenshot 2024-01-02 192724.png');  
background-attachment:fixed;  background-position: crnter; background-size: 2200px 500px, cover;  ">Try It's Lakme</h1>
</div>
<div class="container ">
    <div class="row">
        <div class="col-md-4">
            <!-- begin panel group -->
            <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
                
                <!-- panel 1 -->
                <div class="panel panel-default rounded">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingOne"data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title"><b>SHIMMER SIREN</b></h4>
                            
                        </div>
                    </span>
                    
                    
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                       
                <div class="card">

                  <!-- Card image -->
                 <div class="view overlay">
               <img class="card-img-top" src="https://www.lakmeindia.com/cdn/shop/files/d1.png?v=1696432913" alt="Card image cap">
                  <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                     </a>
                    </div>


</div>
<!-- Card -->
                      </div>
                    </div>
                </div> 
                <!-- / panel 1 -->
                
                <!-- panel 2 -->
                <div class="panel panel-default rounded">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab2" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title collapsed"> <B>RAINBOW BURST </B> </h4>
                        </div>
                    </span>

                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        <div class="card ">

                          <!-- Card image -->
                          <div class="view overlay">
                          <img class="card-img-top" src="https://www.lakmeindia.com/cdn/shop/files/d2.png?v=1696432938"alt="Card image cap">
                          <a href="#!">
                     <div class="mask rgba-white-slight"></div>
                         </a>
                    </div>


</div>
                        </div>
                    </div>
                </div>
                <!-- / panel 2 -->
                
                <!--  panel 3 -->
                <div class="panel panel-default rounded">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab3" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingThree"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title"><b>  GLITTER BOMB</b> </h4>
                        </div>
                    </span>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                          <!-- tab content goes here -->
                          <div class="view overlay">
                          <img class="card-img-top" src="https://www.lakmeindia.com/cdn/shop/files/Glitter.png?v=1697804316"alt="Card image cap">
                          <a href="#!">
                     <div class="mask rgba-white-slight"></div>
                         </a>
                    </div>


                          </div>
                        </div>
                      </div>
            </div> <!-- / panel-group -->
             
        </div> <!-- /col-md-4 -->
        
        <div class="col-md-8">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                    <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <div class="tab-pane  in active " id="tab1">
                                <video class="w-100 h-100" autoplay loop muted>
                                               <source src="https://cdn.shopify.com/videos/c/o/v/efbb207857d14c749a73fcd09a6c1b70.mp4" type="video/mp4" />
                                                </video>

                                </div>
                                <div class="tab-pane  " id="tab2">
                                <video class="w-100 h-100" autoplay loop muted>
                                               <source src="https://cdn.shopify.com/videos/c/o/v/78366c5b3eec465f9841bceab81b6433.mp4" type="video/mp4" />
                                                </video>
                                </div>
                                <div class="tab-pane fade" id="tab3">
                                    
                                       
                                        <video class="w-100 h-100" autoplay loop muted>
                                               <source src="https://cdn.shopify.com/videos/c/o/v/bed660f9009d4e06b56830dffe574852.mp4" type="video/mp4" />
                                                </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-base"></div>
            </div> <!-- end macbook pro mockup -->



        </div> <!-- / .col-md-8 -->
    </div> <!--/ .row -->
</div> <!-- end sidetab container -->
</body>
</html>


<!-- Bootstrap! code End  -->
<div class="carousel-inner">
    <div class="carousel-item active rounded border border-dark  mt-2  border-1">
    <img src="https://www.coletteandyvonne.com/wp-content/uploads/2019/02/LFW_slider_08.jpg" class="d-block w-100" alt="...">
    </div>
</div>




<section class="products">

<h1 class="title rounded-pill "  style="background-image: url('img/Screenshot 2024-01-02 192724.png');  
background-attachment:fixed;  background-repeat:no-repeat; ">latest products</h1>

  

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <div class="price">Rs<?php echo $fetch_products['price']; ?>/-</div>
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>





         <?php
if($fetch_products['stock'] == 0){

echo '<h4 style="color:red;" > out of stock</h4>';
}
else{
    echo '<h4 style="color:green;"> In stock</h4>';
   echo'<input type="number" name="product_quantity" value="1" min="0" max="'.$fetch_products['stock'].'" class="qty">
   ';

   echo '<input type="submit" value="add to cart" name="add_to_cart" class="btn">
   ';


   if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    
    ($check_cart_numbers=$totalstock = $fetch_products['stock'] -  $product_quantity );


    $check_cart_numbers =  mysqli_query($conn, "UPDATE `products` SET stock = ' $totalstock' WHERE name = '$product_name'") or die('query failed');
 
 

  }

    
 
   // $message[] = 'product updated successfully!';
   



}
   


?>







          <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
             </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>
<div  class="rounded  mt-4  border-1" style="text-align: left;    background-image: url('img/Screenshot 2024-01-02 211107.png');
            background-repeat:no-repeat;
background-attachment:fixed;
            height: 50vh ;    background-position:  right;" >



        
</div>
<Br><br>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body,html {
  height: 50%;
  background-color: white;
}

.container {
  overflow: hidden;
  .slider {
    animation: slidein 30s linear infinite;
    white-space: nowrap;
    .logos {
      width: 100%;
      display: inline-block;
      margin: 0px 0;
      .fab {
        width: calc(100% / 5);
        animation: fade-in 0.5s 
          cubic-bezier(0.455, 0.03, 0.515, 0.955) forwards;
      }
    }
  }
}

@keyframes slidein {
  from {
    transform: translate3d(0, 0, 0);
  }
  to {
    transform: translate3d(-100%, 0, 0);
  }
}

@keyframes fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

  </style>
</head>
<body>
<div class="container h-100">
  <div class="row align-items-center h-100">
    <div class="container rounded">
      
      <div class="slider">
        <div class="logos">
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/1.png" data-lightbox="photos"><img class="img-fluid" src="company img/1.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/2.png" data-lightbox="photos"><img class="img-fluid" src="company img/2.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/4.png" data-lightbox="photos"><img class="img-fluid" src="company img/4.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/5.png" data-lightbox="photos"><img class="img-fluid" src="company img/5.png"></a></div>

        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/6.png" data-lightbox="photos"><img class="img-fluid" src="company img/6.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/7.png" data-lightbox="photos"><img class="img-fluid" src="company img/7.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/8.png" data-lightbox="photos"><img class="img-fluid" src="company img/.png"></a></div>
       
             
  
        </div>
        <div class="logos">
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/9.png" data-lightbox="photos"><img class="img-fluid" src="company img/9.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/10.png" data-lightbox="photos"><img class="img-fluid" src="company img/10.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/t1.png" data-lightbox="photos"><img class="img-fluid" src="company img/t1.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/t2.png" data-lightbox="photos"><img class="img-fluid" src="company img/t2.png"></a></div>

        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/6.png" data-lightbox="photos"><img class="img-fluid" src="company img/6.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/7.png" data-lightbox="photos"><img class="img-fluid" src="company img/7.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="" data-lightbox="photos"><img class="img-fluid" src=""></a></div>
       
       
             
  
        </div>
      
      
        <div class="logos">
         
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/6.png" data-lightbox="photos"><img class="img-fluid" src="company img/6.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/7.png" data-lightbox="photos"><img class="img-fluid" src="company img/7.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/8.png" data-lightbox="photos"><img class="img-fluid" src="company img/8.png"></a></div>
       
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/9.png" data-lightbox="photos"><img class="img-fluid" src="company img/9.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/10.png" data-lightbox="photos"><img class="img-fluid" src="company img/10.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/t1.png" data-lightbox="photos"><img class="img-fluid" src="company img/t1.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/t2.png" data-lightbox="photos"><img class="img-fluid" src="company img/t2.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-3 item"><a href="company img/t2.png" data-lightbox="photos"><img class="img-fluid" src="company img/t3.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/7.png" data-lightbox="photos"><img class="img-fluid" src="company img/7.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/8.png" data-lightbox="photos"><img class="img-fluid" src="company img/8.png"></a></div>
       
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/9.png" data-lightbox="photos"><img class="img-fluid" src="company img/9.png"></a></div>
        <div class="col-sm-3 col-md-2 col-lg-2 item"><a href="company img/10.png" data-lightbox="photos"><img class="img-fluid" src="company img/10.png"></a></div>
        
       
        </div>
      </div>
    </div>
  </div>

</div>
  
</body>
</html>

<div class="carousel-inner">
    <div class="carousel-item active rounded border border-dark  mt-2  border-1">
    <img src="https://www.thehaircaregroup.com/globalassets/haircare-group/the-hub/news/introducing-the-new-lakme-reshaping-colour-range/lakme_desktop-featured-image.jpg" class="d-block w-100" alt="...">
    </div>
</div>


<br>
<section class="home-contact"  style="background-color:black;";>

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia aliquam quis saepe? Quia, libero.</p>
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>



<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>


</div>
</body>
</html>