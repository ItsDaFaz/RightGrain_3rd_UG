<html>
<title>Find Right Crop</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<style>
    body, html {height: 100%}
    body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
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
<!-- Navbar (sit on top) -->
<div class="w3-padding-32 w3-white ">
    <span class="w3-text-green w3-hide-small " style= "font-size: 250%; margin-top: 2%; margin-left: 2%">RightGrain</span>
    <div class="w3-container ">
    </div>
    <div class="w3-row  "style="margin-top: -2%; margin-left: 50%" id="myNavbar">
        <a href="home.php" class="w3-bar-item w3-button">HOME</a>
        <a href="donate.html" class="w3-bar-item w3-button">DONATE</a>
        <a href="buysell.html" class="w3-bar-item w3-button">BUYSELL</a>
        <a href="about.html" class="w3-bar-item w3-button">ABOUT</a>
        <a href="home.html#contact" class="w3-bar-item w3-button">CONTACT</a>
        <a href="home.html#feedback" class="w3-bar-item w3-button">FEEDBACK</a>
    </div>
</div>
<br>
<br>
<!--findcrop-->
<br>
<br>



<div class="w3-container w3-padding-64 w3-white  w3-xlarge" style="background-repeat: no-repeat;
                                                                                     background-size: cover;
                                                                                     background-image: url(123.jpg);
                                                                   min-height: 100%" id="about">

    <style>
        input[type= number], select
        {
            width: 100%;
            padding: 8px 10px;
            margin: 5px 10x;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 30%;
            background-color: green;
            color: white;
            padding: 12px 20px;
            margin: 120px 350px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: green;
        }
    </style>
    <div class="w3-content">

        <div>
            <p  for="amount" style="margin-left: -3%; color: white; margin-top: 32%">  <b>Select Division</b> </p>
            <!--  <p><a href="#menu" class="w3-button w3-xxlarge w3-green" style="margin-top: 2%; margin-left: -8%">Find Information</a></p>-->
            <form action="searchCropCode.php" method="post">

                <select id="district" name="district" style="width: 15%; height: 7%; margin-left: -2%">
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Chapai Nawabganj"> Chapai Nawabganj</option>
                    <option value="Naogoan">Naogoan</option>
                    <option value="Pabna">Pabna</option>
                    <option value="Nator">Nator</option>
                    <option value="Dinajpur">Dinajpur</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Khagrachuri">Khagrachuri</option>
                    <option value="Jamalpur">Jamalpur</option>
                    <option value="Panchagor">Panchagor</option>
                </select>

        </div>
        <div>
            <p  for="amount" style="margin-left: 42%; color: white; margin-top: -14%">  <b>Select Season</b> </p>

            <!--  <p><a href="findRightCrop.html" class="w3-button w3-xxlarge w3-green" style="margin-top: 2%; margin-left: 36%">Find Right Crop</a></p> -->

            <select id="season" name="season" style="width: 15%; height: 7%; margin-left: 43%; margin-top: 0%">
                <option value="Summer">Summer</option>
                <option value="Autumn">Autumn</option>
                <option value="Winter">Winter</option>
            </select>
        </div>
        <div>
            <p  for="landAmount" style="margin-left: 88%; color: white; margin-top: -11.5%">  <b>Land Area</b> </p>

            <input type="int(11)" id="landAmount" name="landAmount" style="width: 10%; margin-top: 0%; margin-left: 89%" >
        </div>

        <input type = "submit" value = "Find"/>
        </form>


    </div>

</div>
<br>
<br>
<br>
<br>
<br>


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