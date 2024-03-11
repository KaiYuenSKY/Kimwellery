<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="hehe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>kimwellery - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">
    </head>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Meie+Script&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=Meie+Script&display=swap');

    .container-xx {
        position: relative;
        text-align: center;
        padding-top: 40px;
        opacity: 100%;
        top: 0px;
        transition: opacity 1.5s, top 1.5s;
    }

    .row-xx {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .column-xx-left {
        height: 70vh;
        flex: 1;
        padding-left: 150px;
        padding-right: 60px;
        }

    .column-xx-right {
        flex: 1;
        padding-right: 150px;
        height:70vh;
    }

    .column-xx-left img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

    .column-xx-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .column-xx-right .text {
        padding: 20px;
        font-size: 18px;
        line-height: 30px;
        font-family: "Lato";
        text-align: justify;
    }

    .column-xx-left .text {
        padding: 20px;
        font-size: 18px;
        line-height: 30px;
        font-family: "Lato";
        text-align: justify;
    }

    .column-xx-left h2 {
        font-size: 32px;
        font-family: "Lato";
        text-align: top;
        padding-bottom: 50px;
    }

    .column-xx-right h2 {
        font-size: 32px;
        font-family: "Lato";
        text-align: top;
        padding-bottom: 50px;
    }
    .aboutus{
        position: relative;
        top: 0px;
        opacity: 100%;
        transition: top 2s, opacity 2s;
    }
    .hidden{
      top: 40px;
      opacity: 0%;
    }
    .hideTitle{
        top:40px;
        opacity: 0%
    }
    </style>

    <body>

    <!-- Navbar start -->
	<?php 
        include 'navbar.php'
    ?>
    <!-- Navbar end -->
    <br><br><br><br>
    
    <div class="container-xx hideTitle">
        <h3 > About Us </h3>
    </div>

    <div class = "aboutus hidden">
        <div class="row-xx">
            <div class="column-xx-left">
                <img src="image/Carousel_1.png" alt="About Us Image">
            </div>
            <div class="column-xx-right">
                <div class="text">
                <h2>Who are we?</h2>
                <p>Kimwellery is a premier ecommerce jewelry store that offers a curated collection of exquisite jewelry pieces. Our website provides customers with a seamless and enjoyable shopping experience, allowing them to explore a wide range of high-quality jewelry from the comfort of their own homes. We specialize in offering fine jewelry for various occasions, including engagement rings, statement necklaces, and delicate bracelets. What sets us apart from others is our commitment to craftsmanship, quality, and personalized customer service.</p>
                </div>
            </div>
        </div>

        <div class="row-xx">
            <div class="column-xx-left">
                <div class="text">
                <h2>Vision & History</h2>
                <p>"Our mission is to bring joy, elegance, and lasting memories to our customers' lives through our exquisite jewelry collection. We aim to provide exceptional quality, craftsmanship, and customer service, making luxury jewelry accessible to all."<br><br> 
                Kimwellery was founded in 2010 by Kim, a passionate jewelry enthusiast with a vision to create a platform where people could find unique and high-quality jewelry pieces. Starting as a small online boutique, the company gradually expanded its collection and gained recognition for its exquisite designs and exceptional customer service. Over the years, Kimwellery has become a trusted name in the jewelry industry, known for its attention to detail and commitment to customer satisfaction. </p>
                </div>
            </div>
            <div class="column-xx-right">
                <img src="image/AboutUs_1.png" alt="About Us Image">
            </div>
        </div>
    </div>

    <br><br><br><br><br>
    <!-- Footer start -->
	<?php 
        include 'footer.php'
    ?>
    <!-- Footer end -->
    <script>
        window.addEventListener('load', function(){
            var title = document.querySelector('.container-xx');
            title.classList.remove('hideTitle');
            window.setTimeout(showContent, 500);
        });
        function showContent(){
            var content = document.querySelector('.aboutus');
            content.classList.remove('hidden');
        }
    </script>
    </body>
</html>