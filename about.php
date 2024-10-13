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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading" style="background-color:black;";>
    <h3>about us</h3>
    <p> <a href="home.php">home</a> / about </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image rounded border border-dark border-4 mt-4">
            <img src="https://www.lakmeindia.com/cdn/shop/files/about1_700x_66ccbbbb-e4e6-4114-97d2-ea9547a7ea47.webp?v=1683705998" alt="">
        </div>

        <div class="content">
            <h3>Personalised Gifting</h3>
            <p><b>"AN ALLY TO THE CLASSIC INDIAN WOMAN, LAKMÉ INSPIRES HER TO EXPRESS THE UNIQUE BEAUTY AND SENSUALITY WITHIN… ENABLING HER TO REALIZE THE POTENCY OF HER BEAUTY."</b>
The contemporary Indian beauty expert - Lakmé continuously innovates to offer a wide range of high performance and world class cosmetics, skincare products, and beauty salons. Combining international cosmetic technology with an in-depth understanding of the Indian woman’s needs, Lakmé also offers its consumers a comprehensive beauty experience through its products that are ideal for a variety of Indian skin tones..</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Corporate Gifting</h3>
            <p>Lakmé was the country's first cosmetic brand to introduce make up to Indian women and takes pride in being the expert on Indian Beauty for over 50 years.

It is a complete beauty brand spanning colour cosmetics & skin care and extending to beauty services through the network of Lakmé Beauty Salons.

Its bond with beauty and fashion is manifested through the Lakmé Fashion Week, which is now the largest fashion event of its kind in the country.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image rounded border border-dark border-4 mt-4">
            <img src="https://www.lakmeindia.com/cdn/shop/files/about2_700x_db58183b-654f-402a-ae45-b0dfbb1d0ccc.webp?v=168370609" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image rounded border border-dark border-4 mt-4">
            <img src="https://www.alojapan.com/wp-content/uploads/2020/06/105961491_104367861285560_4651805164545663364_n.jpg" alt="">
        </div>

        <div class="content">
            <h3>Plant gifting is a wonderful way to express </h3>
            <p>Plant gifting is a wonderful way to express your thoughts and feelings, and to spread joy, life, and inspiration. It's a gift that keeps on giving, as the recipient will enjoy the beauty and benefits of the plant for years to come. So why not surprise someone special today with a plant that truly comes from the heart? </p>
            <a href="#reviews" class="btn">clients reviews</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="https://wallpapercave.com/dwp1x/wp7142786.jpg" alt="">
            <p>It is waterproof and stays well long last. Maintains my lashes looking great. Looks amazing upon on eyes</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                
             <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Advika </h3>
        </div>

        <div class="box">
            <img src="https://wallpapercave.com/wp/wp6743504.jpg" alt="">
            <p>Good collections of cosmetic as well as skin care products. I really liked the new cushion collections of creamy, matte lipsticks. They are So much affordable and budget friendly as well as high quality. Stays on the lips for long time.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Bhavna shinde</h3>
        </div>

        <div class="box">
            <img src="https://i.pinimg.com/originals/97/40/62/974062f8ff854624170fe957cff044fa.jpg" alt="">
            <p>Lakme is the best brand in India, and I love the cosmetics products and quality they deliver as one of my favourite bands..</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Devaki bhandari</h3>
        </div>

       

    

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>
