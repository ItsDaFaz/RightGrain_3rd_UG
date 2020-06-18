<?php

$name1 = ($_POST['Username']);
$contact1 = ($_POST['contact']); 
$address1 = ($_POST['address']);
$amount1 = ($_POST['amount']);

$user = 'root';
$pass = '';
$db = 'donate';
$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');


$sql = "INSERT INTO addcash(name , contact , address,amount) VALUES('$name1','$contact1', '$address1',$amount1 )";
$res1 = $db_connect->query($sql)  or die('bad query 1');


?>
<!DOCTYPE html>
<html>
<title>RightGrain</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {font-family: "Lora", sans-serif}
.mySlides {display: none}
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Lora", sans-serif}
.menu {display: none}

.bgimg {
    color: white;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("home1.jpg");
    min-height: 100%;
}
</style>
<body>

  <!-- Navbar (sit on top) -->
<div class="w3-padding-32 w3-white ">
    <span class="w3-text-green w3-hide-small " style= "font-size: 250%; margin-top: 2%; margin-left: 2%">RightGrain</span>
    <div class="w3-container ">    
		 </div>
  <div class="w3-row  "style="margin-top: -2%; margin-left: 50%" id="myNavbar">
    <a href="home.html" class="w3-bar-item w3-button">HOME</a>
    <a href="donate.html" class="w3-bar-item w3-button">DONATE</a>
       <a href="buysell.html" class="w3-bar-item w3-button">BUYSELL</a>
    <a href="about.html" class="w3-bar-item w3-button">ABOUT</a>
    <a href="home.html#contact" class="w3-bar-item w3-button">CONTACT</a>
    <a href="home.html#feedback" class="w3-bar-item w3-button">FEEDBACK</a>
  </div>
</div>
    
     <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="farmer.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>FARMER1</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p> 
        <h1 class="w3-hide-small"></h1>
      <p><a href="donate.html" class="w3-button w3-black w3-padding-large w3-large">Donate</a></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="farmer2.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>FARMER2</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>  
        <h1 class="w3-hide-small"></h1>
      <p><a href="donate.html" class="w3-button w3-black w3-padding-large w3-large">Donate</a></p>
    </div>
  </div>
  
  
<!-- Header with image -->
<header class="bgimg w3-display-container " style="width:100%" id="home">
  
    <span class="w3-text-green w3-hide-small" style= "font-size: 300%; margin-top: 2%; margin-left: 2%">FIND</span>\
 <!-- <div class="w3-display-middle w3-center">
      <span class="w3-text-black w3-hide-small" style= "font-size: 500%"><b>Grow Your Impact</b></span>
      <span class="w3-text-dimgray w3-hide-small" style= "font-size: 250%; color: dimgray"><br> Every little donation counts
             <p><a href="#menu" class="w3-button w3-xxlarge w3-green">Donate </a></p>
      </span> 
   </div>-->
       <p><a href="InfoMain.html" class="w3-button w3-large w3-transparent" style="margin-top: 38%; margin-left: 15%;border: 1px solid white">Find Information</a></p>
    <p><a href="findRightCrop.html" class="w3-button w3-large w3-transparent" style="margin-top: -8%; margin-left: 70%;border: 1px solid white">Find Right Crop</a></p>
  
</header>

<!-- Menu Container -->
      



   <br>
      
      <br>
      <br>


    
          
    
   


<!-- Contact -->
    
    
    
<div class="w3-container w3-padding-64 w3-white w3-grayscale-min w3-xlarge" style = "background-repeat: no-repeat;
                                                                                     background-size: cover;
                                                                                     background-image: url(contact.jpg);
                                                                                     min-height: 100%" id="contact">
  <div class="w3-content">
    
    
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <fieldset class="border" style="border-width: thick;border-color: gray">
        <Legend style= "color: blueviolet; font-size: 25px">  Contact Details </Legend>
                <h1 style="color: black; font-size: 20px"  > 
                    <br>
            Mobile Number: <br>
            +88017 7105 2473 <br>
            +88017 9840 1308 <br>
            <br>
            If you want to know more or need any help.<br>
            <b>We are here!</b> <br>
                    <br>
            Email ID: <br>
            rightGrain@gmail.com <br>
            
            <br>
            Address:
            5th floor, Nobodoy Housing,  <br>
            Gulshan, road no. 2, Dhaka 1212 <br>
                    <br>
                    
         <marquee style="color: white; font-size: 10px: "> Thank you for visiting our website. </marquee>
                </h1>
        
        
        </fieldset>
      <br>
    
  </div>
</div>
    
    
    <!-- Feedback -->
    
<div class="w3-container w3-padding-64 w3-white w3-xlarge" style = "background-repeat: no-repeat;
                                                                                     background-size: cover;
                                                                                     background-image: url(feedback1.jpg);
                                                                                     min-height: 100%" id="feedback">
  <div class="w3-content">
    
    
    
   
      <br>
    <p class="w3-xxlarge"><br> We always love to hear your feedbacks:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="Email" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Contact Number" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-green w3-block w3-round" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>

   

 
<!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Any Question?</h4>
        <p>Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
       
        <p><a href="#">Payment</a></p>

        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> RightGrain</p>
        <p><i class="fa fa-fw fa-phone"></i> 0171323458</p>
        <p><i class="fa fa-fw fa-envelope"></i> RightGrain@gmail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Bkash</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

 

 

<script>
    
    // Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
            </html>
