<!-- 
    03 June | Wei Ean | First Draft
-->

<?php
    session_start();
    require 'config.php';
  
    // Set total price of the product in the cart table
    if (isset($_POST['qty'])) {
      $qty = $_POST['qty'];
      $pid = $_POST['pid'];
      $pprice = $_POST['pprice'];

      if ($qty <= 0){
        $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id=?");
        $stmt->bind_param('i', $pid);
        $stmt->execute();
      } else {
        $tprice = $qty * $pprice;

        $stmt = $conn->prepare('UPDATE cart SET cart_qty=?, total_price=? WHERE cart_id=?');
        $stmt->bind_param('isi',$qty,$tprice,$pid);
        $stmt->execute();
      }
      
    }
?>