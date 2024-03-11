<!-- 
    Read me: 
    hehe hello c:
    
    1. This is a very ugly checkout page I am sorry 

    03 June | Wei Ean | First Draft
	07 June | Audrey | UI design done (beautified)
-->

<?php
    session_start();
    require 'config.php';

    $grand_total = 0;
    $custom_charges = 50;
    $delivery_charges = 10;
    $allItems = '';
    $items = [];

    //changes to select only a certain user id's orders
    $user_id=$_SESSION['user_id'];
    $sql = "SELECT CONCAT(product_name,'&nbsp&nbsp&nbsp x' ,cart_qty) AS ItemQty, total_price FROM cart WHERE user_id = $user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
        $grand_total += $row['total_price'];
        $grand_grand_total = $grand_total + $custom_charges + $delivery_charges;
        $items[] = $row['ItemQty'];
    }
    $allItems = implode('<br>', $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="hehe">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">

</head>

<body>
    
	 <!-- Navbar start -->
  <?php include "navbar.php"?>
  <!-- Navbar end -->

    <div class="container">
        <div class = "row">
            <div class = "col" id = "order">
                <h1>Order Summary</h1><br>
                <div class="jumbotron">
                    <h6><b>Your Order: </b><br><?=$allItems; ?></h6><br>
                    <h6><b>Delivery Charge: RM </b><?=$delivery_charges?></h6><br>
                    <h6><b>Custom Charge: RM </b><?=$custom_charges?></h6><br>
                    <h6><b>Total Amount Payable: RM </b><?= number_format($grand_grand_total, 2)?></h6>
                </div>
                <form action="" method="post" id="placeOrder">
                    <input type="hidden" name="products" value="<?= $allItems; ?>">
                    <input type="hidden" name="order_status" value="Processing">
                    <input type="hidden" name="grand_grand_total" value="<?= $grand_grand_total; ?>">
					
					<h1>Contact Detail</h1><br>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div><br>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
                    </div><br>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                    </div>
					<br>
					<h1>Shipping Address</h1><br>
					<label for="country"><h6>Select Country:</h6></label>
						<select id="country" name="country">
							<option value="MY">Malaysia</option>
							<option value="SG">Singapore</option>
							<option value="ID">Indonesia</option>
							<option value="TH">Thailand</option>
							<!-- Add more options as needed -->
						</select>
					<br><br>
                    <div class="form-group">
                        <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Full Address"></textarea>
                    </div><br>
                    <div class="place-order">
                        <input type="submit" name="submit" value="PLACE ORDER" class="btn-1">
                    </div>
					<br>
					<br>
					<br>
                </form>
            </div>
        </div>
    </div>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'checkout_action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

  });
  </script>
</body>
</html>