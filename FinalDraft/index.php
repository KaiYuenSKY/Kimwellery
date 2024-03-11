<!--
    22 June |   sky   | First Draft
    23 June |  Abhay  | Beautify and Carousel
    25 June |   sky   | Matched UI design with other pages, adjustments in appearance + animation

-->

<?php session_start() ?>

<!-- Zhen Han's Cookie -->
<?php
// Check if the welcome back cookie is set
if (isset($_COOKIE['welcome_back'])&&isset($_SESSION['user_name'])) {
    $welcomeBack = true;
} else {
    // Set the welcome back cookie
    setcookie('welcome_back', '1', time() + (86400 * 30), '/');
    $welcomeBack = false;
}
?>



<style>
    td.product-icon{
      transform: scale(1,1);
      transition: transform 0.2s;
    }
    td.product-icon:hover{
      transform: scale(1.05,1.05);
    }
    .category-icon{
      transition: transform 0.3s;
      transform: scale(1,1);
    }
    .category-icon:hover{
      transform: scale(1.05,1.05)
    }
    .rotate {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
    }
    .row-alt{
        display:-ms-flexbox;
        display:flex;
        flex-wrap:wrap;
    }
    .header {
        background-color: #148ae3;
        font-family: 'Lato', sans-serif;
        color: #FFFFFF;
        padding: 7px;
        text-align: center;
        position: fixed;
        top: 0;
        width: 100%;
        transition: top 0.3s;
    }

    .header.hidden {
        top: -50px;
    }
    /* oof */

    /* Slideshow container */
    .slideshow-container {
        width: 100%;
        height: 100%;
        position: relative;
        overflow-x: hidden;
        overflow-y: hidden;
        padding-top: 40px;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        margin-left: -8px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 50px 50px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        margin-right: -8px;
        border-radius: 50px 0 0 50px;
    }

    /* On hover, add a blac background color with a little bit see-through 
        update: made it white
    */
    .prev:hover, .next:hover {
        color: #3F2E1F;
        background-color: rgba(255, 255, 255,0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        top: 75%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 999;
    }

    /* The dots/bullets/indicators */
    .dot {
    cursor: pointer;
    height: 10px;
    width: 10px;
    margin: 0 2px;
    background-color: #717171;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
    background-color: #F1F1F1;
    }

    /* Fading animation */ /*update : added fade out */
    .fade {
    animation-name: fade;
    animation-duration: 6s;
    }

    @keyframes fade {
    0% {opacity: .2}
    30% {opacity: 1}
    95%{opacity: 1}
    100% {opacity: .2}
    }

    .image-container {
    position: relative;
    display: inline-block;
    }

    .mySlides {
        position: relative;
    }

    .mySlides::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.3;
    }
    .mySlides .carouselBtn{
        position: absolute;
        top: 75%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        background-color: transparent;
        color: #FFFFFF;
        border: 1px solid #FFFFFF;
        padding: 8px 50px;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .mySlides .carouselBtn:hover {
        color: #3F2E1F;
        background-color: #FFFFFF;
        border: 1px solid #FFFFFF;
    }

    .text-on-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Meie Script', cursive;
    font-size: 60px;
    font-weight: 100; 
    color: white;
    text-align: center;
    }

    .container-xx{
        text-align: center;
        padding-top:75px;
        padding-bottom: 75px;
    }

    .product-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .product-item {
        width: calc(20% - 20px); /* Adjust the width as desired */
        margin: 10px;
        padding: 10px;
        background-color: #f1f1f1;
        border-radius: 5px;
        text-align: center;
    }
</style>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="hehe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kimwellery</title>
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">	
  
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }

    </script>

    <script>
        window.onload = function(){
            //click three times to move back to first slide
            clickButton();
            clickButton();
            clickButton();
        }
        function clickButton(){
                var button = document.getElementById('press_on');
                button.click();
            }
        window.setInterval(clickButton, 6000);
    </script>
</head>

  <!-- Show welcome message based on login cookie -->
  <?php
    if ($welcomeBack) {
        echo '<div class="header hidden">Welcome back!</div>';
    } else {
        echo '<div class="header hidden">Welcome!</div>';
    }
  ?>

  <body>
    <!-- Navbar start -->
	<?php include 'navbar.php'?>
    <!-- Navbar end -->

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="image/Carousel_4.png" style="width:100vw; height:90vh; object-fit:cover">
            <div class="text-on-image">Jewellery that your occasion deserves</div>
            <a href="shop.php" class="carouselBtn">Shop Now</a>
        </div>

        <div class="mySlides fade">
            <img src="image/Carousel_5.png" style="width:100vw; height:90vh; object-fit:cover">
            <div class="text-on-image">Jewellery for every occassion</div>
            <a href="shop.php" class="carouselBtn">Shop Now</a>
        </div>

        <div class="mySlides fade">
            <img src="image/Carousel_2.png" style="width:100vw; height:90vh; object-fit:cover">
            <div class="text-on-image">Exclusive Offers!</div>
            <a href="shop.php" class="carouselBtn">Shop Now</a>
        </div>
        <!-- Next and previous buttons --><!-- update: moved press_on to next -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" id = "press_on" onclick="plusSlides(1)">&#10095;</a>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center; position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%);">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <!-- DONE DONE DONE DONE -->


    <div class = "container-xx">
        <h3 class = "shopping-cart">Our Bestselling Items</h3>
        <table style="width:100%;">
            <tr>
            <td style ="padding-right: 0%;"><h6  class = "rotate" style="font-size:15px;">SHOP</td>
            <td style ="padding-left: 0%;"><a href="shop.php" class="rotate"><h6 style="font-size:15px; text-decoration:underline;"><b>ALL PRODUCTS</b></h6></a></td>
                <?php
                    include 'config.php';
                    $stmt = $conn->prepare('SELECT * FROM product WHERE product_name like "%ou%"');
                    $stmt->execute();
                    $result = $stmt->get_result();          
                    while ($row = $result->fetch_assoc()):
                ?>
                <td class = "product-icon" style="padding-right: 0%; padding-left: 3%">
                <div class="shop-image">
					<a href = "product.php?productID=<?= $row['product_id']?>"><img src="<?= $row['product_image'] ?>" width="200"></a>
				</div><br>
                <a href = "product.php?productID=<?= $row['product_id']?>">
				    <h6 style="font-size:15px;"><?= $row['product_name']?></h6>
				</a>
				  
                <h5 style="font-size:12px; color: #797979">RM <?= $row['product_price']?></h5>
            </td>
                <?php endwhile; ?>
            </tr>
        </table>    
    </div>

    <img src = "image/_Get 10_ Off_.png" width = 100%>
    
    <div class = "container-xx">
    <h3 class = "shopping-cart">New Arrivals</h3>
    <table style="width:100%;">
        <tr>
            <td style ="padding-right: 0%;"><h6  class = "rotate" style="font-size:15px;">NEW</td>
            <td style ="padding-left: 0%;"><a href="shop.php" class="rotate"><h6 style="font-size:15px; text-decoration:underline;"><b>THIS MONTH</b></h6></a></td>
            <?php
                $stmt = $conn->prepare('SELECT * FROM product WHERE product_name like "%en%"');
                $stmt->execute();
                $result = $stmt->get_result();
                $count = 0;          
                while ($row = $result->fetch_assoc()):
            ?>
            <td class = "product-icon" style="padding-right: 0%; padding-left: 3%">
                <div class="shop-image">
					<a href = "product.php?productID=<?= $row['product_id']?>"><img src="<?= $row['product_image'] ?>" width="200"></a>
				</div><br>
                <a href = "product.php?productID=<?= $row['product_id']?>">
				    <h6 style="font-size:15px;"><?= $row['product_name']?></h6>
				</a>
				  
                <h5 style="font-size:12px; color: #797979">RM <?= $row['product_price']?></h5>
            </td>
            <?php 
                if($count==4) break;
                $count++;
                endwhile; 
            ?>
        </tr>
    </table>
    <br><br><br><br><br>
    <h5 class="shopping-cart">SHOP BY <b>CATEGORY</b></h5>
	
	<div class="category-bubble">
		<a class = "category-icon" href="shop.php?category=Necklaces"><img src="image/Necklace.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Bracelets"><img src="image/Bracelet.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Rings"><img src="image/Rings.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Earrings"><img src="image/Earings.png" width="200px"></a>
	</div>   
    </div>

    <br><br><br><br>

    <!--footer-->
    <?php include 'footer.php'?>

    <script>
        // Show the header box after the page loads
        window.addEventListener('load', function() {
            var header = document.querySelector('.header');
            header.classList.add('hidden');
            header.classList.remove('hidden');

            //i added a timeout so that the message disappears after 1.5 second
            window.setTimeout(addHidden,1500);
        });
        function addHidden(){
            var header = document.querySelector('.header');
            header.classList.add('hidden');
        }
    </script>
  </body>
</html>