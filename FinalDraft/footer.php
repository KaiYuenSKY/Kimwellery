<!-- Tried to add a bit of sticky but sometimes contents of the page will scroll on top of navbar

    Navbar that I (Sky) use for shop and product
    To make those files work as expected, make sure new nav bar's hyperlinks are correct, such as shop.php/?category=Rings

	21 June | Audrey | I beautified the navbar, linked every file, and I've put the CSS style here.
	Use navbar hyperlink in every page.

-->
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Meie+Script&display=swap" rel="stylesheet">

<style>

div.container-footer.w-container {
  box-sizing: border-box;
  margin-left: auto;
  background: #3F2E1F;
  margin-right: auto;
  max-width: 100%;
  padding-bottom: 40px;
  padding-top: 70px;
}

div.container-footer.w-container:after {
  clear: both;
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

div.container-footer.w-container:before {
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

div.w-row {
  box-sizing: border-box;
  margin-left: -10px;
  margin-right: -10px;
}

div.w-row:after {
  clear: both;
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

div.w-row:before {
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

/* div.footer-column.w-clearfix.w-col.w-col-4 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 40px;
  padding-right: 40px;
  position: relative;
  width: 33.3333%;
} */

/* *************************************************************************************************************** */

div.footer-column.w-clearfix.w-col.w-col-4 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 40px;
  padding-right: 40px;
  position: relative;
  width: 33.3333%;
}

div.footer-column.w-clearfix.w-col.w-col-4 .logo-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

img.failory-logo-image {
  border-width: 0;
  box-sizing: border-box;
  display: inline-block;
  max-width: 100%;
  min-width: 200px;
  vertical-align: middle;
  padding-top: 25px;
  margin-bottom: 10px; /* Added margin to create space between logo and description */
}

p.footer-description-failory {
  box-sizing: border-box;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 300;
  letter-spacing: .5px;
  line-height: 1.5em;
  margin-top: 0; /* Removed margin-top to align description with the logo */
}

/* ************************************************************************************************************** */

div.footer-column.w-clearfix.w-col.w-col-4:after {
  clear: both;
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

div.footer-column.w-clearfix.w-col.w-col-4:before {
  content: " ";
  display: table;
  grid-column-end: 2;
  grid-column-start: 1;
  grid-row-end: 2;
  grid-row-start: 1;
}

/* img.failory-logo-image {
  border-width: 0;
  box-sizing: border-box;
  display: inline-block;
  float: left;
  max-width: 100%;
  vertical-align: middle;
} */

h3.footer-failory-name {
  box-sizing: border-box;
  color: #FFFFFF;
  display: block;
  font-family: Lato, sans-serif;
  font-size: 20px;
  font-weight: 900;
  line-height: 1.1em;
  margin-bottom: 10px;
  margin-left: 10px;
  margin-top: 24px;
}

/* p.footer-description-failory {
  box-sizing: border-box;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 300;
  letter-spacing: .5px;
  line-height: 1.5em;
  margin-bottom: 16px;
  margin-top: 15px;
} */

br {
  box-sizing: border-box;
}

div.footer-column.w-col.w-col-8 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 10px;
  padding-right: 10px;
  position: relative;
  width: 66.6667%;
}

div.w-col.w-col-8 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 0;
  padding-right: 0;
  position: relative;
  width: 66.6667%;
}

div.w-col.w-col-7.w-col-small-6.w-col-tiny-7 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 0;
  padding-right: 0;
  position: relative;
  width: 58.3333%;
}

h3.footer-titles {
  box-sizing: border-box;
  color: #FFFFFF;
  display: block;
  font-family: Lato, sans-serif;
  font-size: 20px;
  font-weight: 900;
  line-height: 1.1em;
  margin-bottom: 0;
  margin-left: 0;
  margin-top: 24px;
}

p.footer-links {
  box-sizing: border-box;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 300;
  letter-spacing: .5px;
  line-height: 1.8em;
  margin-bottom: 16px;
  margin-top: 2px;
}

a {
  background-color: transparent;
  box-sizing: border-box;
  color: #FFFFFF;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 400;
  line-height: 1.2em;
  text-decoration: none;
}

a:active {
  outline: 0;
}

a:hover {
  outline: 0;
}

span.footer-link {
  box-sizing: border-box;
  color: rgba(255, 255, 255, 0.8);
  font-weight: 300;
}

span.footer-link:hover {
  color: #FFFFFF;
  font-weight: 400;
}

span {
  box-sizing: border-box;
}

strong {
  box-sizing: border-box;
  font-weight: 700;
}

div.w-col.w-col-5.w-col-small-6.w-col-tiny-5 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 0;
  padding-right: 0;
  position: relative;
  width: 41.6667%;
}

div.column-center-mobile.w-col.w-col-4 {
  box-sizing: border-box;
  float: left;
  min-height: 1px;
  padding-left: 0;
  padding-right: 0;
  position: relative;
  width: 33.3333%;
}

a.footer-social-network-icons.w-inline-block {
  background-color: transparent;
  box-sizing: border-box;
  color: #FFFFFF;
  display: inline-block;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 400;
  line-height: 1.2em;
  margin-right: 8px;
  margin-top: 10px;
  max-width: 100%;
  opacity: .8;
  text-decoration: none;
  padding-right: 20px;
  padding-top: 20px;
}

a.footer-social-network-icons.w-inline-block:active {
  outline: 0;
}

a.footer-social-network-icons.w-inline-block:hover {
  opacity: 1;
  outline: 0;
}

/*img {
  border-width: 0;
  box-sizing: border-box;
  display: inline-block;
  max-width: 100%;
  padding: 10 10 10 10;
  vertical-align: middle;
}
commented to make logo look normal
*/

p.footer-description {
  box-sizing: border-box;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  font-family: Lato, sans-serif;
  font-size: 17px;
  font-weight: 300;
  letter-spacing: .5px;
  line-height: 1.5em;
  margin-bottom: 16px;
  margin-top: 15px;
  padding-top: 20px;
}

strong.link-email-footer {
  box-sizing: border-box;
  font-weight: 700;
}

</style>
	
<!-- FIXED Navbar start -->
<div class="container-footer w-container">
  <div class="w-row">
    <div class="footer-column w-clearfix w-col w-col-4">
        <!-- <img src="image/Logo_white.png" alt="" width="50%" class="failory-logo-image"> -->
        <!-- <p class="footer-description-failory">Lorem ipsum dolor sit amet.<br></p> -->
        <div class="logo-container">
            <img src="image/Logo_white.png" alt="" width="50%" class="failory-logo-image">
            <p class="footer-description-failory">Jewellery that your occassion deserves<br></p>
        </div>
    </div>
    <div class="footer-column w-col w-col-8">
      <div class="w-row">
        <div class="w-col w-col-8">
          <div class="w-row">
            <div class="w-col w-col-7 w-col-small-6 w-col-tiny-7">
              <h3 class="footer-titles">Products</h3><br>
                <p class="footer-links">
                    <a href="shop.php?category=Necklaces"><span class="footer-link">Necklaces<br></span></a>
                    <a href="shop.php?category=Earrings"><span class="footer-link">Earrings<br></span></a>
                    <a href="shop.php?category=Rings"><span class="footer-link">Rings</span></a>
                    <span><br></span>
                    <a href="shop.php?category=Bracelets"><span class="footer-link">Bracelets<br></span></a>
                    <strong><br></strong>
                </p>
            </div>
            <div class="w-col w-col-5 w-col-small-6 w-col-tiny-5">
              <h3 class="footer-titles">Support</h3><br>
                <p class="footer-links">
                    <a href="index.php"><span class="footer-link">Home<br></span></a>
                    <a href="aboutus.php"><span class="footer-link">About Us<br></span></a>
                    <a href="profile.php"><span class="footer-link">Profile<br></span></a>
                    <a href="cart.php"><span class="footer-link">Cart</span></a>
                    <strong><br></strong>
                </p>
            </div>
          </div>
        </div>
        <div class="column-center-mobile w-col w-col-4">
          <h3 class="footer-titles">Socials</h3>
            <a href="" target="_blank" class="footer-social-network-icons w-inline-block">
                <img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbf0a2f2b67e3b3ba079c_Twitter%20Icon.svg" width="20" alt="Twitter icon"></a>
            <a href="" target="_blank" class="footer-social-network-icons w-inline-block">
                <img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbfe70fcf5a0514c5b1da_Instagram%20Icon.svg" width="20" alt="Instagram icon"></a>
            <a href="" target="_blank" class="footer-social-network-icons w-inline-block">
                <img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dbe42e1e6034fdaba46f6_Facebook%20Icon.svg" width="20" alt="Facebook Icon"></a>
            <!-- <a href="" target="_blank" class="footer-social-network-icons w-inline-block">
                <img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0002f2b676eb4ba0869_LinkedIn%20Icon.svg" width="20" alt="LinkedIn Icon"></a>
            <a href="" target="_blank" class="footer-social-network-icons w-inline-block">
                <img src="https://uploads-ssl.webflow.com/5966ea9a9217ca534caf139f/5c8dc0112f2b6739c9ba0871_Pinterest%20Icon.svg" width="20" alt="Pinterest Icon" class=""></a> -->
          <p class="footer-description">Email: <a href=""><a class="link-email-footer">support@kimwellery.com</a><br></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navbar end -->