<!-- 
    Read me: 
    hehe hello c:

    1. Since add to cart is moved to product.php, shop_action.php is actually product_action.php, but naming is fine right?

    2.some important classes 
        there are some classes that I use to refer to some data
        i will let you know through the comments
        basically dont touch those class names xD

    03 June | Wei Ean | First Draft
    14 June |   Sky   | Editted layout and included variation for categories
    18 June |   Sky   | Moved add to cart functionalities to product.php
	  21 June | Audrey  | UI design done (beautified)
    22 June |   sky   | Minor changes + animation
-->


<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="hehe">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shop - Kimwellery</title>
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	
	 <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">
	<style>
    .title{
      text-align: center;
	    justify-content: center;
      position: relative;
      top: 60px;
      opacity: 100%;
      transition: top 1.5s, opacity 1.5s;
    }

    .productList{
      top: 60px;
      opacity: 100%;
      position: relative;
      transition: top 1.5s ,opacity 1.5s;
    }
    .banner{
      top: 40px;
      opacity: 100%;
      position: relative;
      transition: top 1.5s ,opacity 1.5s;
    }
    .hideBanner{
      top: 0px;
      opacity: 0%;
    }
    .hidden{
      top: 120px;
      opacity: 0%;
    }
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
  </style>
</head>
<body>
	
  <!-- Navbar start -->
  <?php include "navbar.php"?>
  <!-- Navbar end -->

  <!-- Sets what category is being displayed -->
  <?php 
    $category;
    if (isset($_GET['category'])){
      $category = $_GET['category'];
    } else {
      $category = "All Products";
    }
  ?>

  <!-- Displaying Products Start -->
	<div id="message"></div>
	
	
	<img class="banner hideBanner" src="image/_Get 10_ Off_.png" style="width:100%">
 	<br><br><br>
	<div class="all-products">
  	
	  
	  <h3 class="title hidden"><?= $category ?></h3>
      <div class = "productList hidden">
       	  <table style="width:100%;">
          <thead>
          <?php
            include 'config.php';
        
            //select products based on category
            if($category=='Necklaces'){
              $stmt = $conn->prepare("SELECT * FROM product WHERE product_category='necklaces'" );
            } else if ($category=='Earrings'){
              $stmt = $conn->prepare("SELECT * FROM product WHERE product_category = 'earrings'");
            } else if ($category=='Rings'){
              $stmt = $conn->prepare("SELECT * FROM product WHERE product_category = 'rings'");
            } else if ($category=='Bracelets'){
              $stmt = $conn->prepare("SELECT * FROM product WHERE product_category = 'bracelets'");
            } else {
              $stmt = $conn->prepare('SELECT * FROM product');
            }
            $stmt->execute();
            $result = $stmt->get_result();
            $rowCount = mysqli_num_rows($result);
            $counter = 0;
          
            while ($row = $result->fetch_assoc()):
          ?> 
          <?php if ($counter%5==0){?>
            <tr>
          <?php }?>
              <td class = "product-icon" style="padding-right: 0%; padding-left: 3%">
                  <div class="shop-image">
					          <a href = "product.php?productID=<?= $row['product_id']?>"><img src="<?= $row['product_image'] ?>" width="200"></a>
				          </div><br>
				  
                  <a href = "product.php?productID=<?= $row['product_id']?>">
					          <h6 style="font-size:15px;"><?= $row['product_name']?></h6>
				          </a>
				  
                  <h5 style="font-size:12px; color: #797979">RM <?= $row['product_price']?></h5>
              </td>
          <?php if (($counter+1)%5==0) {?>
            </tr>
          <?php   if ($counter==4){?>
          </thead>
          <?php        } 
                };
                $counter++;
          ?>
          <?php endwhile; ?>
        </table>
      </div>
  </div>
  <br><br><br><br><br><br><br><br>
	
  <!-- Displaying Products End -->
	
	<h5 class="shopping-cart">SHOP BY <b>CATEGORY</b></h5>
	
	<div class="category-bubble">
		<a class = "category-icon" href="shop.php?category=Necklaces"><img src="image/Necklace.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Bracelets"><img src="image/Bracelet.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Rings"><img src="image/Rings.png"  width="200px"></a>
		<a class = "category-icon" href="shop.php?category=Earrings"><img src="image/Earings.png" width="200px"></a>
		
		
	
	</div>
	
  <!-- footer -->
  <br><br><br><br><br>
	<?php include 'footer.php' ?>

  <script>
    window.addEventListener('load', function(){
      var content = document.querySelector('.title');
      content.classList.remove('hidden');
      window.setTimeout(function(){
        var content = document.querySelector('.productList');
        content.classList.remove('hidden');
      }, 300);
      var banner = document.querySelector('.banner');
      banner.classList.remove('hideBanner');
    });
  </script>
</body>
</html>