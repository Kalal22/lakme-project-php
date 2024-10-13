<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">


  <style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-size: 16px;
    font-weight: 300;
    line-height: 23px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
  
  justify-content: center;
  align-items: center;
  
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
ul{
    list-style-type:none;
}
a,a:hover{
    text-decoration: none;
}
@import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700');
body{
    font-family: 'Montserrat', sans-serif;
    .testimonial{
        padding: 100px 0;
        .row{
            .tabs{
                all: unset;
                margin-right: 50px;
                display: flex;
                flex-direction: column;
                li{
                    all:unset;
                    display: block;
                    position: relative;
                    &.active{
                        &::before{
                            position: absolute;
                            content: "";
                            width: 50px;
                            height: 50px;
                            background-color: #71b85f;
                            border-radius: 50%;
                        }
                    }
                    &.active{
                        &::after{
                            position: absolute;
                            content: "";
                            width: 30px;
                            height: 30px;
                            background-color: #71b85f;
                            border-radius: 50%;
                        }
                    }
                    &:nth-child(1){
                       align-self: flex-end;
                       &::before{
                            left: 64%;
                            bottom: -50px;
                       }
                       &::after{
                            left: 97%;
                            bottom: -81px;                           
                       }
                       figure{
                            img{
                                margin-left:auto;
                            }
                       }
                    }
                    &:nth-child(2){
                        align-self: flex-start;
                        &::before{
                            right: -65px;
                            top: 50%;                    
                        }
                        &::after{
                            bottom: 101px;
                            border-radius: 50%;
                            right: -120px;
                        }
                        figure{
                            img{
                                margin-right:auto;
                                max-width: 300px;
                                width: 100%;
                                margin-top: -50px;
                            }
                        }
                    }
                    &:nth-child(3){
                        align-self: flex-end;
                        &::before{
                            right: -10px;
                            top: -66%;                  
                        }
                        &::after{
                            top: -130px;
                            border-radius: 50%;
                            right: -46px;
                        }
                        figure{
                            img{
                                margin-left:auto;
                                margin-top: -50px;
                            }
                        }
                        &:focus{
                            border: 10px solid red;
                        }
                    }
                    figure{
                        position: relative;
                        img{
                            display: block;
                        }
                        &::after{
                            content: "";
                            position: absolute;
                            top:0;
                            z-index: -1;
                            width: 100%;
                            height: 100%;
                            border: 4px solid #dff9d9;
                            border-radius: 50%;
                            -webkit-transform: scale(1);
                            -ms-transform: scale(1);
                            transform: scale(1);
                            -webkit-transition: 0.3s;
                            -o-transition: 0.3s;
                            transition: 0.3s;
                        }
                        &:hover{
                            &::after{
                                -webkit-transform: scale(1.1);
                                -ms-transform: scale(1.1);
                                transform: scale(1.1);
                            }
                        }
                    }
                }
                &.carousel-indicators{
                    li.active{
                        figure{
                            &::after{
                                -webkit-transform: scale(1.1);
                                -ms-transform: scale(1.1);
                                transform: scale(1.1);
                            }
                        }
                    }
                }
            }
            .carousel{
                > h3{
                    font-size: 20px;
                    line-height: 1.45;
                    color: rgba(0,0,0,.5);
                    font-weight: 600;
                    margin-bottom: 0;
                }
                h1{
                    font-size: 40px;
                    line-height: 1.225;
                    margin-top: 23px;
                    font-weight: 700;
                    margin-bottom: 0;
                }
                .carousel-indicators{
                    all: unset;
                    padding-top: 43px;
                    display: flex;
                    list-style: none;
                    li{
                        background: #000;
                        background-clip: padding-box;
                        height: 2px;
                    }
                }
                .carousel-inner{
                   .carousel-item{
                        .quote-wrapper{
                            margin-top: 42px;
                            p{
                                font-size: 18px;
                                line-height: 1.72222;
                                font-weight: 500;
                                color: rgba(0,0,0,.7);
                            }
                            h3{
                                color: #000;
                                font-weight: 700;
                                margin-top: 37px;
                                font-size: 20px;
                                line-height: 1.45;
                                text-transform: uppercase;
                            }
                        }
                   }
                }
            }
        }
    }
}
@media only screen and (max-width: 1200px) {
    body{
        .testimonial{
            .row{
                .tabs{
                    margin-right: 25px;
                }
            }
        }
    }
}
@media only screen and (max-width: 567px) {
    
}



  </style>


<script>
    $(document).ready(function(){
  $(".testimonial .indicators li").click(function(){
    var i = $(this).index();
    var targetElement = $(".testimonial .tabs li");
    targetElement.eq(i).addClass('active');
    targetElement.not(targetElement[i]).removeClass('active');
            });
            $(".testimonial .tabs li").click(function(){
                var targetElement = $(".testimonial .tabs li");
                targetElement.addClass('active');
                targetElement.not($(this)).removeClass('active');
            });
        });
$(document).ready(function(){
    $(".slider .swiper-pagination span").each(function(i){
        $(this).text(i+1).prepend("0");
    });
});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
<?php @include 'header.php'; ?>

<section class="heading"  style="background-color:black;";>
    <h3>contact us</h3>
    <p> <a href="home.php">home</a> / contact </p>
</section>










    <section class="contact">

<form action="" method="POST">
    <h3>send us message!</h3>
    <input type="text" name="name"  value="<?php echo $_SESSION['user_name']; ?>"  placeholder="enter your name" class="box" required> 
    <input type="email" name="email"value="<?php echo $_SESSION['user_email'];?>"placeholder="enter your email" class="box" required>
    <input type="number" name="number" placeholder="enter your number" class="box" required>
    <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10" required></textarea>
    <input type="submit" value="send message" name="send" class="btn bg-info text-white w-25 p-3 ">
</form>

</section>




<br>
<br>
<br>




<?php @include 'footer.php'; ?>


<script src="js/script.js"></script>

</body>
</html>
