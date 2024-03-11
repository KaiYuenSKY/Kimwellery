<!-- 

Read me:
    1. I think this page Zhen Han will do nicer with the settings stuff so dont beautify first
    
    02 June | Zhen Han | First Draft 
    03 June | Wei Ean | Integration
	10 June | Audrey | UI design done (beautified)
-->
<?php

@include 'config.php';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initil-scale=1.0">
    <title>Profile - Kimwellery</title>

    <!-- custom css file link --> 
    <link rel="stylesheet": href="style.css"><!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">
	
  <style>
    .contents{
      top: 0px;
      opacity: 100%;
      position: relative;
      transition: top 1s ,opacity 1s;
    }
    .hidden{
      top: 20px;
      opacity: 0%;
    }
  </style>
</head>

<body>

   	 <!-- Navbar start -->
  <?php include "navbar.php"?>
  <!-- Navbar end -->
	
<div class="container">
  <div class = "contents hidden">
    <h3 class="shopping-cart">Profile</h3>
    
    <div class="profile-content">
		<img src="image/Mask group.png" width=150>
        <br><br>
        <h4 class="welcome-back">Welcome back, <span><?php echo $_SESSION['user_name'] ?></span>!</h4> 
        <br>
        <h5><b>USER ID: <span><?php echo $_SESSION['user_id'] ?></span</b></h5>
        <h5>This is a user's profile page.<br><br><br><br>

          <a href="login.php" class="btn-1">LOGIN</a>
          <a href="register.php" class="btn-1">REGISTER</a>
          <a href="logout.php" class="btn-2">LOGOUT</a></h5>
    </div>
  </div>
</div>

</div>

<!-- footer -->
<br><br><br><br><br>
<?php include  'footer.php' ?>

<script>
    window.addEventListener('load', function(){
      var content = document.querySelector('.contents');
      content.classList.remove('hidden');
    });
</script>

</body>
</html> 