<!-- Tried to add a bit of sticky but sometimes contents of the page will scroll on top of navbar

    Navbar that I (Sky) use for shop and product
    To make those files work as expected, make sure new nav bar's hyperlinks are correct, such as shop.php/?category=Rings

	21 June | Audrey | I beautified the navbar, linked every file, and I've put the CSS style here.
	Use navbar hyperlink in every page.

	22 June |  sky   | Fixed the hover animation a bit, let register only show when not logged in

-->
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">

<style>
  
	/*nav bar style*/

.navbar {
 	background-color: #FFFFFF;
  	position:sticky;
  	top: 0;
	height: 0rem;
  	z-index: 999;
	width: inherit;

}
.bg-white {
	display: flex;
	background-color: #FFFFFF;
	height: 5rem;
}

.navbar-center img {
  padding-top: 20px;
  height: 60px;
}

.navbar-left {
	text-align:left;
	margin-top: 32px;
    width: 200rem;
}

.navbar-right {
	text-align:end;
    margin-top: 32px;
    width: 200rem;
  }

.navbar-right img{
    margin: 0 5%;
  }

.navbar-link {
	display: inline-block;
	padding-bottom: 20px;
	text-decoration: none;
	font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 14px;
	color: #3F2E1F;
	margin: 0 5%;
}

.bg-dark{
	background-color: #3F2E1F;
	z-index: 999;
	align-content: center;
	align-items: center;
	justify-content: center;
	height: 2.5rem;
}

.nav-product{
    display: inline-block;
	padding:10px;
    font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 14px;
    color: #FFFFFF;
	margin: 0 4%;
	padding-top: 10px;
	transform: scale(1,1);
}

.navbar-products {
	text-align: center;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  animation: sticky-animation 0.3s;
}

@keyframes sticky-animation {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
	
/*navbar link hover & active state*/

.nav-product {
    transition: transform 0.5s ease;
}

.nav-product:hover {
    transform: scale(1.13,1.13);
}

.nav-product:active {
    font-weight: bold;
}

/* ------------------ general -------------------- */
{
    border-radius: 50px;
    font-family: 'Lato', sans-serif;
	font-weight: 400;
	color: #3F2E1F;
	font-size:13px;

}
	
*{
   
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}


</style>
	
<!-- FIXED Navbar start -->
	<div class="bg-white">
			<div class="navbar-left">
				<!-- show login and register when not logged in, show log out when logged in -->
				<?php
					if(!isset($_SESSION['user_name'])){
						echo '<a href="login.php" class="navbar-link">LOGIN</a>';
						echo '<a href="register.php" class="navbar-link">REGISTER</a>';
					} else {
						echo '<a href="logout.php" class="navbar-link">LOGOUT</a>';
					}
				?>
				
				
			</div>
			
			<div class="navbar-center">
				<a href="index.php" class="logo-black"><img src="image/Logo_black.png" class="logo-black" alt="logo-black" height="30px"></a>
			</div>

			<div class="navbar-right">
				<a href="cart.php" class="nav-link" alt="nav-link"><img src="image/icon_cart2.png" width="25px"></a>
				<a href="profile.php" class="nav-link" alt="nav-link"><img src="image/icon_profile2.png" width="25px"></a>
			</div>
		</div>

		<nav class="navbar">

		<nav class="navbar bg-dark">
			<div class="navbar-products">
			  <a href="index.php" class="nav-product">HOME</a>
			  <a href="shop.php" class="nav-product">SHOP ALL</a>
			  <a href="shop.php?category=Necklaces" class="nav-product">NECKLACES</a>
			  <a href="shop.php?category=Earrings" class="nav-product">EARRINGS</a>
			  <a href="shop.php?category=Rings" class="nav-product">RINGS</a>
			  <a href="shop.php?category=Bracelets" class="nav-product">BRACELETS</a>
			  <a href="aboutus.php" class="nav-product">ABOUT US</a>
			</div>
  		</nav>
  	</nav>
	

<!-- Navbar end -->