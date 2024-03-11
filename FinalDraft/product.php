<!-- 
    Read me: 
    
    Nothing important to mention
    
    14 June |   Sky   | First Draft
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
  <title>Product - Kimwellery</title>
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	
	<!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">
	<style>
    .product-container{
      top: 0px;
      opacity: 100%;
      position: relative;
      transition: top 1.5s ,opacity 1.5s;
    }
    .addItemBtn{
      font-family: 'Lato', sans-serif;
      font-weight: 400;
      color: #FFFFFF;
      background-color: #3F2E1F;
      padding: 10px 20px;
      border-radius: 50px;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }
    .hidden{
      top: 40px;
      opacity: 0%;
    }
  </style>


</head>
<body>
	
  <!-- Navbar start -->
  <?php include "navbar.php"?>
  <!-- Navbar end -->

  <!-- Sets what product is being displayed -->
  <?php 
    $productID;
    if (isset($_GET['productID'])){
      $productID = $_GET['productID'];
    } 
  ?>

  <!-- Displaying Products Start -->
  <?php
    include 'config.php';
    
    $stmt = $conn->prepare("SELECT * FROM product WHERE product_id='$productID'" );
    $stmt->execute();
    $result = $stmt->get_result();
    $row=$result->fetch_assoc();
  ?>
  <div class = "container">
	   <div id="message"></div>
	   
    <div id="product-container" class="product-container hidden">
      	
		<div class="product-image">
        <img src="<?= $row['product_image'] ?>" width="400">
      	</div> 
        
		<div class="product-name">
          <h5><?= $row['product_id']?></h5>
          <h7><?= $row['product_name']?></h7>
		  <br><br>
          <h8>RM <?= $row['product_price']?>.00</h8>
		  
			<br><br>
		  <h6>Description:<br>Please note that the carat weight, number of stones and product dimensions will vary based on the size of the creation you order. For detailed information please contact us.</h6>
		  <br>
			
			
          <!-- dont touch class = "addItemBtn, pid, pname, pprice, pimage, user_id, pqty" -->
          <form action="" class="form-submit">
            <input type="number" class="form-control pqty" value="1">
            <input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
            <input type="hidden" class="user_id" value="<?=$_SESSION['user_id']?>">
            <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
            <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
			 <br>
            <button class="addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;ADD TO CART</button>
          </form>
        </div>  
		
	</div>
                 
  </div>           

  <!-- Displaying Products End -->

  <!-- footer -->
  <br><br><br><br><br>
  <?php include 'footer.php' ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
 
  <script type="text/javascript">
    window.addEventListener('load', function(){
      var content = document.querySelector('.product-container');
      content.classList.remove('hidden');
    });

    $(document).ready(function() {

      // Send product details in the server
      $(".addItemBtn").click(function(e) {
          e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var user_id = $form.find(".user_id").val();

            var pqty = $form.find(".pqty").val();

            $.ajax({
              url: 'shop_action.php',
              method: 'post',
              data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pqty: pqty,
                pimage: pimage,
                user_id: user_id
              },
              success: function(response) {
                $("#message").html(response);
                window.scrollTo(0, 0);
              }
            });
          
      });

    });
  </script>
</body>

</html>