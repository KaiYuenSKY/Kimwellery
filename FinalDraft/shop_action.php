<!-- 
    03 June | Wei Ean| First Draft 
-->

<?php
    session_start();
    require 'config.php';
        // Add products into the cart table 
        if (isset($_POST['pid'])){
            $pid = $_POST['pid'];
            $pname = $_POST['pname'];
            $pprice = $_POST['pprice'];
            $pimage = $_POST['pimage'];
            $user_id = $_POST['user_id'];
            $pqty = $_POST['pqty'];
            $total_price = $pprice * $pqty;
    // need to try with users
            $stmt = $conn->prepare('SELECT product_id FROM cart WHERE product_id=? && user_id=?');
            $stmt->bind_param('ss',$pid, $user_id);
            $stmt->execute();
            $res = $stmt->get_result();
            $r = $res->fetch_assoc();
            $code = $r['product_id']??'';

            if (!$code){
                $query = $conn->prepare('INSERT INTO cart(product_name, product_price, product_image, cart_qty, total_price, product_id, user_id) VALUES (?,?,?,?,?,?,?)');
                $query->bind_param('sssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pid, $user_id);
                $query->execute();

                echo "<script>alert('item added to your cart!')</script>";

            }else{
                // find the cart entry and add qty and update total price
                $stmt = $conn->prepare('SELECT cart_qty, total_price, product_price FROM cart WHERE product_id=? && user_id=?');
                $stmt->bind_param('ss',$pid, $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $qty = $row['cart_qty'];
                $total_price = $row['total_price'];
                $product_price = $row['product_price'];

                $qty = $qty + $pqty;
                $total_price = $qty * $product_price;

                $stmt = $conn->prepare("UPDATE cart SET cart_qty = ?, total_price = ? WHERE product_id = ? && user_id=?");
                $stmt->bind_param("iiss", $qty, $total_price, $pid, $user_id);
                $stmt->execute();

                echo "<script>alert('More of it added!')</script>";

            }
        }
?>