<?php
$user = 'root';
$pass = '';
$db = 'donate';
$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');

//echo "connected"."<br>";



$query1 = "SELECT name,contact,address,amount FROM addcash ORDER BY c_id DESC";
$result1 = $db_connect->query($query1) or die('bad query 1');


?>

<html>
<title>Find Post</title>
    
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Lora", sans-serif}
.menu {display: none}
.bgimg {
    color: white;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("home2.jpg");
    min-height: 100%;
}
</style>
    <body>
        
        <!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-medium w3-white w3-opacity w3-hover-opacity-off" style="margin-top: 2%; margin-left: 60%" id="myNavbar">
    <a href="home.html" class="w3-bar-item w3-button">HOME</a>
    <a href="donate.html" class="w3-bar-item w3-button">DONATE</a>
    <a href="home.html#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="home.html#contact" class="w3-bar-item w3-button">CONTACT</a>
    <a href="home.html#feedback" class="w3-bar-item w3-button">FEEDBACK</a>
  </div>
</div>
        
        <span class="w3-text-green w3-hide-small" style= "font-size: 300%; margin-top: 2%; margin-left: 2%">rightGrain</span>
         <div class="w3-container w3-white w3-padding-64 w3-large" id="find">
  <div class="w3-content">
  
    <h1 class="w3-center w3-xxxlarge" style="margin-bottom:40px">DONATE</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-gray" >
      <a href="javascript:void(0)" onclick="openMenu(event, 'Cash');" id="myLink">
        <div class="w3-col s12 tablink w3-padding-large w3-hover-green ">Donate Cash</div>
      </a>
      
     
    </div>
      
      

    <div id="Cash" class="w3-container menu w3-padding-32 w3-white" >

        
        <?php
    while($rows=$result1->fetch_assoc())
    {
    ?>

    <p class="w3-text-black" style="font-size: 100%"> 
      Name : <?php echo $rows['name'];?> <br>
      Contact: <?php echo $rows['contact'];?> <br>
      Address: <?php echo $rows['address'];?> <br>
      Amount: <?php echo $rows['amount'];?> <br>
          <a href="sendcash.html" class="w3-button w3-green w3-round-large">
                   Send Cash
                </a>
        </p>
      <hr>
   
    <?php
    }
    ?>
      

    </div>


   <br>

  </div>
</div>
        <script>
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