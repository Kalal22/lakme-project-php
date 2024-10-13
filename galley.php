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
   <title>Gallery</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
 
<?php @include 'header.php'; ?>

<section class="heading"  style="background-color:black;";>
    <h3>your Gallery</h3>
    <p> <a href="home.php">Home</a> / Gallery </p>
</section>




  <div id="carouselExampleControls" class="carousel slide  rounded border border-white border-4 " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active  rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://media6.ppl-media.com/tr:dpr-2,dpr-2/mediafiles/ecomm/misc/1708712037_lakme_9-5-2596x836.jpeg" alt="First slide">
    </div>
    <div class="carousel-item  rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://media6.ppl-media.com/tr:dpr-2,dpr-2/mediafiles/ecomm/misc/1681920826_lakme_default-banner-_web_1298x418.jpg" alt="Second slide">
    </div>
    <div class="carousel-item rounded border border-dark border-4 ">
      <img class="d-block w-100" src="https://media6.ppl-media.com/tr:dpr-2,dpr-2/mediafiles/ecomm/misc/1689239201_1280x400.jpg" alt="Third slide">
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


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">


<style>
   .photo-gallery {
  color:#313437;
  background-color:#fff;
}

.photo-gallery p {
  color:#7d8285;
}

.photo-gallery h2 {
  font-weight:bold;
  margin-bottom:40px;
  padding-top:40px;
  color:inherit;
}

@media (max-width:767px) {
  .photo-gallery h2 {
    margin-bottom:25px;
    padding-top:25px;
    font-size:24px;
  }
}

.photo-gallery .intro {
  font-size:16px;
  max-width:500px;
  margin:0 auto 40px;
}

.photo-gallery .intro p {
  margin-bottom:0;
}

.photo-gallery .photos {
  padding-bottom:20px;
}

.photo-gallery .item {
  padding-bottom:30px;
}


</style>
<title>Title</title>

</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Gallery -->
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"> Lakme menu<ry/h2>
                <p class="text-center"> </p>
            </div>


 



            <div class="row photos">
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product/31RAhzDvhML._SX300_SY300_QL70_FMwebp_.webp" data-lightbox="photos"><img class="img-fluid" src="lakme product/31RAhzDvhML._SX300_SY300_QL70_FMwebp_.webp"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product/Lakme9to5EyeColorQuartetEyeShadow-DesertRose_1024x102.webp" data-lightbox="photos"><img class="img-fluid" src="lakme product/Lakme9to5EyeColorQuartetEyeShadow-DesertRose_1024x102.webp"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\41R7qFRNg5L._SX522_.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product\41R7qFRNg5L._SX522_.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product/OIP (1).jpeg" data-lightbox="photos"><img class="img-fluid" src="lakme product/OIP (1).jpeg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\51AsddpBtBL._SL1000_.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product\51AsddpBtBL._SL1000_.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product/SUNSET.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product/SUNSET.jpg"></a></div>
           
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\27706_S1-8901030960154_600x.webp" data-lightbox="photos"><img class="img-fluid" src="lakme product\27706_S1-8901030960154_600x.webp"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\Best-Lakme-Makeup-Products-in-India.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product\Best-Lakme-Makeup-Products-in-India.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\Lakme-Banner-new_tcm1255-515196.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product\Lakme-Banner-new_tcm1255-515196.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\Lakme-Eyeconic-Kajal-Pencil-Deep-SDL558695413-1-37865.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product\Lakme-Eyeconic-Kajal-Pencil-Deep-SDL558695413-1-37865.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\OIP.jpeg" data-lightbox="photos"><img class="img-fluid" src="lakme product\OIP.jpeg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product\makeup-kit-products-png-png-all-makeup-products-png-1417_1063.png" data-lightbox="photos"><img class="img-fluid" src="lakme product\makeup-kit-products-png-png-all-makeup-products-png-1417_1063.png"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme product/LIQUID1.jpg" data-lightbox="photos"><img class="img-fluid" src="lakme product/LIQUID1.jpg"></a></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="lakme img\Desktop_Banner_x800.webp" data-lightbox="photos"><img class="img-fluid" src="lakme img\Desktop_Banner_x800.webp"></a></div>
         
           
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<!-- Gallery -->


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
<section class="home-contact" style="background-color:black;";>

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia aliquam quis saepe? Quia, libero.</p>
      <a href="contact.php" class="btn" style="background-color: orange;">contact us</a>
   </div>

</section>


<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>