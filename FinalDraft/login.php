<!-- 
    02 June | Zhen Han | First Draft 
    03 June | Wei Ean | Integration
    05 June | abhay | beautify
-->

<?php

@include 'config.php';

session_start();



if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user WHERE user_email = '$email' && user_password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0 ){
        $row = mysqli_fetch_array($result);

        if($row['user_role']== 'admin'){
            $_SESSION['admin_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['user_id'];
            header('location:index.php');

        }elseif($row['user_role'] == 'user'){
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['user_id'];
            header('location:index.php');
        }

    }else{
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initil-scale=1.0">
    <title>Login - Kimwellery</title>

     <!-- custom css file link --> 
     <link rel="stylesheet": href="login_style.css">
     <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
    .hidden{
      top: 20px;
      opacity: 0%;
    }
    .image-border{
        border-radius: 0px 30px 30px 0px;
    }
  </style>
</head>
<body>

<!-------------------------------------------------------------------------->

<!-- shows an alert when user clicked on profile/cart before logging in -->
<?php
if(isset($_GET['showAlert'])){
    echo '<script>alert("Please Login First")</script>';
}
?>
<div class="container hidden">
    <div class="cover">
      <div class="front">
        <img class = "image-border" src="./image/Carousel_4.png" alt="">
        <div class="text">
          <span class="text-1">Quality Jewellery <br> An event's memory</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
            <div class="login-form">
                <form action="" method="post">
                    <div class="title">Login</div>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" required placeholder="enter your email">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" required placeholder="enter your password">
                        </div>
                        <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
                            <?php
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg">'.$error.'</span>';
                                    };
                                };
                            ?>
                        <div class="button input-box">
                            <input type="submit" name="submit" value="login now" class="form-btn">
                        </div>
                        <div class="text sign-up-text">Don't have an account? <a href="register.php">Register Here</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    window.addEventListener('load', function(){
      var content = document.querySelector('.container');
      content.classList.remove('hidden');
    });
    </script>

</body>
</html>