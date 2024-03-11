<!-- 
    Read me: 
    hehe hello c:
    1.some important classes 
        there are some classes that I use to refer to some data
        i will let you know through the comments
        basically dont touch those class names xD

    2. the ugly quantity thing
        to make the nice quantity thing like in the figma will 
        require me to make like 3 more functions that i will need
        more time to test. we will stick to the ugly one first and 
        if i manage to make the pretty looking one i let you know ok?

    03 June | Wei Ean | First Draft
	10 June | Audrey | UI design done (beautified)
    22 June |   Sky  | Animation
-->

<?php
    session_start();

    if(!isset($_SESSION['user_name'])){
        echo "<script>alert('" . $_SESSION['user_name'] . "');</script>";
        header('location:login.php?showAlert=1');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="hehe">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart - Kimwellery</title>
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
        padding-bottom: 30px;
        top: -50px;
        opacity: 100%;
        position: relative;
        transition: top 1.5s, opacity 1.5s;
    }
    .cart{
      top: -50px;
      opacity: 100%;
      position: relative;
      transition: top 1.5s ,opacity 1.5s;
    }
    .hideBanner{
      border-radius: 200px 0px 0px 200px;
      transform: translateX(100%);
      opacity: 0%;
    }
    .hidden{
      top: 0px;
      opacity: 0%;
    }
  </style>
</head>

<body>
    <!-- Navbar start -->
  <?php include "navbar.php"?>
  <!-- Navbar end -->
	
    <div class="container">
        
         <h3 class="title hidden">Shopping Cart</h3>  
         <div class = "cart hidden">      
            <div class="row">
                <div class="col">
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                            
                            <tr>
                                <th>IMAGE</th>
                                <th>PRODUCT</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require 'config.php';
                                    $user_id=$_SESSION['user_id'];
                                    $stmt = $conn->prepare('SELECT * FROM cart WHERE user_id=?');
                                    $stmt->bind_param('i', $user_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    $custom_charges = 50;
                                    $delivery_charges = 10;
                                    while ($row = $result -> fetch_assoc()):
                                    $grand_total += $row['total_price']; 
                                    $grand_grand_total = $grand_total + $custom_charges + $delivery_charges;
                                ?>
                                <tr>
                                    <!-- dont touch class = "pid" --> 
                                    <input type="hidden" class="pid" value="<?= $row['cart_id']?>">

                                    <td><img src="<?= $row['product_image'] ?>" width="150"></td>

                                    <td>
                                        <b><?= $row['product_name']?></b>
                                        <!--<b><?= $row['product_variation']?></b>-->
                                    </td>

                                    <td>RM<?=number_format($row['product_price'],2);?></td>
                                    <!-- dont touch class = "pprice" --> 
                                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                    
                                    <td>
                                    <!-- dont touch class = "itemQty" --> 
                                    <input type="number" class="itemQty form-control" value="<?= $row['cart_qty'] ?>" style="width:75px;">
                                    </td>

                                    <td>RM<?=number_format($row['total_price'],2);?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    
                    </div>
                </div>
                
                <div class="col-smol">
                    <h4 class="text-info">SUBTOTAL:  <?= number_format($grand_total,2); ?></h4><br>
                    <h6>The prices of products are expressed in Malaysian Ringgit excluding customs duties.<br><br>

                        For orders outside of Malaysia :<br>
                        All applicable duties shall be borne by the customer. Unfortunately, we cannot estimate how much custom duties you may eventually pay but your local customs should be able to estimate the price.</h6>
                </div>
            </div> 
        </div>
    </div>
	
	<div class="text-info-column">
    <a href="shop.php" class="text-info">CLICK ME TO<br><b>CONTINUE SHOPPING</b></a> 
	</div>
	
	<div class="sticky-checkout hideBanner">
                <table class="table">
                    <tr>
                        <td colspan="2"><h5>Custom Charges RM50<br><br>Delivery Charges RM10<br></h5></td>
						
                        <td></td>
						
                        <td>
						    <b>GRAND TOTAL: RM<?= number_format($grand_grand_total,2); ?></b><br><br>
                            <a href="checkout.php" class="btn-1 <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;CHECKOUT</a>
                        </td>
                    </tr>
                </table>
    </div>
    
    <!--  footer  -->
    <?php include 'footer.php' ?>
    <br><br><br><br><br><br>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script type="text/javascript">
        window.addEventListener('load', function(){
            var content = document.querySelector('.title');
            content.classList.remove('hidden');
            window.setTimeout(function(){
                var content = document.querySelector('.cart');
                content.classList.remove('hidden');
            },300);
            var banner = document.querySelector('.sticky-checkout');
            banner.classList.remove('hideBanner');
        });

        $(document).ready(function(){

            // Change the item quantity
            $(".itemQty").on('change', function() {
            var $el = $(this).closest('tr');

            var pid = $el.find(".pid").val();
            var pprice = $el.find(".pprice").val();
            var qty = $el.find(".itemQty").val();
            location.reload(true);

            $.ajax({
                url: 'cart_action.php',
                method: 'post',
                cache: false,
                data: {
                qty: qty,
                pid: pid,
                pprice: pprice
                },
                success: function(response) {
                console.log(response);
                }
            });
        });

        });
    </script>
</body>