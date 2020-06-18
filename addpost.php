<html>
<title>Add Post</title>

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




<!-- ADD POST cash -->

<div class="w3-container w3-padding-64 w3-white  w3-xlarge"  id="addcash">

    <div class="w3-content">
        <style>
            input[type=text], select {
                width: 100%;
                padding: 8px 20px;
                margin: 5px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing:border-box;
            }

            input[type= number], select
            {
                width: 100%;
                padding: 8px 20px;
                margin: 5px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit] {
                width: 50%;
                background-color: green;
                color: white;
                padding: 12px 20px;
                margin: 8px 220px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: green;
            }


        </style>
        <br>
        <div class="hero">
            <h2> Enter your information </h2>
        </div>


        <div>
            <form action="addcash.php" method = "post">
                <label for="uname">Name</label>
                <input type="text" id="uname" name="Username" placeholder="Your name..">
                <br>
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" placeholder="Your contact..">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Your address..">


                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Your required amount..">

                <input type="submit" value="Submit" >


            </form>
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