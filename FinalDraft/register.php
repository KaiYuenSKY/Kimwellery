<!-- 
    02 June | Zhen Han | First Draft 
    03 June | Wei Ean | Integration

-->

<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user WHERE user_email = '$email' && user_password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0 ){

        $error[] = 'user already exist!';

    }else{

        if($pass !=$cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user(user_name,user_email, user_password, user_role) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:index.php');

        }
    }

};

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="hehe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Kimwellery</title>

    <!-- custom css file link --> 
    <link rel="stylesheet": href="register_style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .image-border{
            border-radius: 0px 30px 30px 0px;
        }
        .hidden{
            padding: 0px 30px;
        }
        .hideForm{
            margin-top: -50px;
            margin-bottom: -50px;
        }
    </style>
</head>

<body>

    <div class="container hidden">

    <div class="cover">
      <div class="front">
        <img class = "image-border" src="./image/Carousel_4.png" alt="">
        <div class="text">
          <span class="text-1">Quality Jewellery <br> An event's memory</span>
        </div>
      </div>
    </div>

    <div class="forms  hideForm">
        <div class="form-content">
            <div class="login-form">
                <form action="" method="post">
                    <div class="title">Register</div>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-user-alt"></i>
                            <input type="text" name="name" required placeholder="Your Name">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" required placeholder="Your Email">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" required placeholder="Your Password">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="cpassword" required placeholder="Confirm your Password">
                        </div>
                        <div class="input-box">
                            <i class="fas fa-id-card-alt"></i>
                            <select name="user_type">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                            <?php
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg">'.$error.'</span>';
                                    };
                                };
                            ?>
                        <div class="button input-box">
                            <input type="submit" name="submit" value="register now" class="form-btn">
                        </div>
                        <div class="text sign-up-text">Already have an account? <a href="login.php">Login Here</a> </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
    <script>
        window.addEventListener('load', function(){
        var content = document.querySelector('.container');
        content.classList.remove('hidden');
        var loginForm = document.querySelector('.forms');
        loginForm.classList.remove('hideForm');
        });
    </script>
</body>
</html>
