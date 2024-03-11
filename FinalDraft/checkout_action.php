
<!-- 
    Read me: 
    hehe hello c:
    
    1. This is a very ugly after checkout page I am sorry, the $data.= part is basically html that needs beautifying

    03 June | Wei Ean | First Draft
    25 June |   Sky   | Added back to home button
-->
<?php
    session_start();
    require 'config.php';
  
    // Checkout and save customer info in the orders table
    if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $products = $_POST['products'];
      $grand = $_POST['grand_grand_total'];
      $address = $_POST['address'];
      $user_id = $_SESSION['user_id'];
      $order_status = $_POST['order_status'];
  
      $data = '';
  
      $stmt = $conn->prepare('INSERT INTO `order` (order_name, order_email, order_phone, order_address, order_products, amount_paid, user_id, order_status)VALUES(?,?,?,?,?,?,?,?)');
      $stmt->bind_param('ssssssss',$name,$email,$phone,$address,$products,$grand, $user_id, $order_status);
      $stmt->execute();
      $stmt2 = $conn->prepare("DELETE FROM cart WHERE user_id=$user_id");
      $stmt2->execute();
      $data .= '<div>
                                <h3>Thank You!</h3>
                                <h2 class="text-success">Your Order Placed Successfully!</h2>
                                <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
                                <h4>Your Name : ' . $name . '</h4>
                                <h4>Your E-mail : ' . $email . '</h4>
                                <h4>Your Phone : ' . $phone . '</h4>
                                <h4>Total Amount Paid : ' . number_format($grand, 2) . '</h4>
                                <div class="place-order">
                                  <a href = "index.php" class = "btn-1">Back to Home</a>
                                </div>
                </div>';
      echo $data;
    }
?>