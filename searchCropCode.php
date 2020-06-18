<?php
$district = ($_POST['district']);
$season = ($_POST['season']);
$landAmount  = ($_POST['landAmount']);

$user = 'root';
$pass = '';
$db = 'findrightcrop2';

$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');

$qry1 = "select district.DistrictName, crop.CropName, 
          (crop.ProductionPerAcre*$landAmount*crop.SellingPricePerKilo 
            - crop.ProductionPerAcre*$landAmount*districtwise.EstimateCostPerKilo) as profit, 
              crop.TimeToHarvest as FirstHarvest from district NATURAL JOIN districtwise 
                NATURAL JOIN crop NATURAL JOIN seasonwise NATURAL JOIN season 
                  WHERE district.DistrictName = '$district' AND season.SeasonName = '$season' 
                    order by profit DESC";

$res1 = $db_connect->query($qry1) or die('bad query 1');

$count = 1;

//echo "Search result for $district in $season with $landAmount acre land" . "<br>"."<br>"."<br>";

//echo "No" . "----------" . "CropName" . "----------" . "First Harvest" . "---------" . "Profit" . "<br>" . "<br>";

/*if(($row1 = $res1->fetch_assoc()) != NULL) {

    //echo $count . "--------------" . $row1["CropName"] . "------------- " . $row1["FirstHarvest"] . " Months ---------" . $row1["profit"] . " Taka" . "<br>";
    $count++;

    while ($row1 = $res1->fetch_assoc()) {

        //echo  $count. "--------------" . $row1["CropName"] . "------------- " . $row1["FirstHarvest"] . " Months ---------" . $row1["profit"] . " Taka" . "<br>";
        $count++;
    }

}*/



/*if ($count ==1){
    echo "It's not a good time to plant anything." ."<br>". "Take Rest !!!". "<br>";
}*/

?>


<!DOCTYPE html>

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

<!--findcrop-->


<div class=" w3-text-green w3-topleft w3-xxlarge" style=" padding:0px 28px">
    <br>
    <a>Search Result for <?php echo $district ." in ". $season; ?></a>
    <br>
    <br>
</div>

<div class="w3-content  ">


    <div class="Searchresult">


        <p></p>
        <?php
        while($rows=$res1->fetch_assoc())
        {
            $count++;
            ?>
            <div class=" w3-display-container w3-row   w3-container">
                <?php
                $cropToQuery = $rows['CropName'];
                $qry4 = "SELECT img1.image FROM crop NATURAL JOIN img1 WHERE crop.CropName = '$cropToQuery'";

                $res4 = $db_connect->query($qry4) or die('bad query 4');
                $rows4=$res4->fetch_assoc();

                echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows4['image'] ).'"/>';
                ?>
                <p></p>
                <!--<img src="buysell.jpg""> -->
                <div class="w3-display-topleft w3-text-white" style="padding:0px 28px">
                    <h1 class="w3-jumbo w3-hide-small"><?php echo $rows['CropName'];?></h1>
                    <p><a class="w3-display-middle-left w3-xlarge"> <?php echo "Profit : " . $rows['profit']; ?> </a> <br>
                    <a class="w3-display-middle-left w3-xlarge"> <?php echo "Harvest After : " . $rows['FirstHarvest']. " months"; ?> </a></p>
                </div>

                <div class="w3-display-middleright w3-text-white" style="padding:0px 250px">
                    <p><a href="seed.html"
                          class="w3-display-top-right w3-button  w3-round-xxlarge w3-green w3-padding-medium w3-large">Buy Seed</a>
                        <a href="InfoMainP1.html"
                           class="w3-display-top-right w3-button w3-green w3-round-xxlarge w3-padding-medium w3-large">Information</a>
                    </p>
                    <br>
                    <br>
                </div>
            </div>

            <?php
        }
        ?>

        <br>

    </div>
</div>




<?php
if($count <= 3){
$diff = 6 - $count;
?>




<?php
$qry2 = "SELECT * from (select district.DistrictName,  crop.CropName, (crop.ProductionPerAcre*$landAmount*crop.SellingPricePerKilo
            - crop.ProductionPerAcre*$landAmount*districtwise.EstimateCostPerKilo) as profit, crop.TimeToHarvest
            as FirstHarvest from (SELECT t3.districtName from (SELECT district.DistrictName,
            SQRT(Power(district.Longitude - t1.t1Long, 2) + Power(district.Latitude - t1.t1Lati, 2))
            as distance FROM district JOIN (SELECT district.Longitude as t1Long, district.Latitude as t1Lati
            FROM district WHERE district.DistrictName = '$district') as t1
            WHERE district.DivisionName = (SELECT district.DivisionName FROM district
            WHERE district.DistrictName = '$district') ORDER by distance LIMIT 4) as t3
            WHERE t3.distance > 0) as t9 JOIN district NATURAL JOIN districtwise NATURAL JOIN crop
            NATURAL JOIN seasonwise NATURAL JOIN season WHERE season.SeasonName = '$season'
            AND t9.districtName = district.DistrictName order by profit DESC LIMIT 10) as t10 where t10.cropName not in 
            
            
            (SELECT t11.CropName from (select district.DistrictName, crop.CropName, 
          (crop.ProductionPerAcre*1*crop.SellingPricePerKilo 
            - crop.ProductionPerAcre*1*districtwise.EstimateCostPerKilo) as profit, 
              crop.TimeToHarvest as FirstHarvest from district NATURAL JOIN districtwise 
                NATURAL JOIN crop NATURAL JOIN seasonwise NATURAL JOIN season 
                  WHERE district.DistrictName = '$district' AND season.SeasonName = '$season'
                    order by profit DESC) as t11) LIMIT 5";

$res2 = $db_connect->query($qry2) or die('bad query 2');


/*while ($row2 = $res2->fetch_assoc()) {
echo  $count. "--------------" . $row2["CropName"] . "------------- " . $row2["FirstHarvest"] . " Months ---------" . $row2["profit"] . " Taka  " . " [ Based on  " . $row2["DistrictName"] . " ]". "<br>";
$count++;
}*/


?>

<div class="w3-content  ">
    <div class="Extrasearch">


        <p></p>
        <?php

        if(($rows2 = $res2->fetch_assoc()) != NULL) {
            ?>
            <div class=" w3-text-green w3-topmiddle w3-xxxlarge" style=" padding:0px 200px">
                <br>
                <a style= "padding:0px 0px">Extra Suggestions</a>
                <br>
                <br>
            </div>
            <div class=" w3-display-container w3-row   w3-container">
                <?php
                $cropToQuery = $rows2['CropName'];
                $qry5 = "SELECT img1.image FROM crop NATURAL JOIN img1 WHERE crop.CropName = '$cropToQuery'";

                $res5 = $db_connect->query($qry5) or die('bad query 5');
                $rows5 = $res5->fetch_assoc();

                echo '<img src="data:image/jpeg;base64,' . base64_encode($rows5['image']) . '"/>';
                ?>
                <p></p>
                <!--<img src="buysell.jpg""> -->
                <div class="w3-display-topleft w3-text-white" style="padding:0px 28px">
                    <h1 class="w3-jumbo w3-hide-small"><?php echo $rows2['CropName']; ?></h1>
                    <p>
                        <a class="w3-display-middle-left w3-xlarge"> <?php echo "Profit : " . $rows2['profit'] . " (Based on " . $rows2['DistrictName'] . " )"; ?> </a>
                        <br>
                        <a class="w3-display-middle-left w3-xlarge"> <?php echo "Harvest After : " . $rows2['FirstHarvest'] . " months"; ?> </a>
                    </p>
                </div>

                <div class="w3-display-middleright w3-text-white" style="padding:0px 250px">
                    <p><a href="seed.html"
                          class="w3-display-top-right w3-button  w3-round-xxlarge w3-green w3-padding-medium w3-large">Buy Seed</a>
                        <a href="./FindInfo/InfoMainP1.html"
                           class="w3-display-top-right w3-button w3-green w3-round-xxlarge w3-padding-medium w3-large">Information</a>
                    </p>
                    <br>
                    <br>
                </div>
            </div>
            <?php

        }

        while ($rows2 = $res2->fetch_assoc()) {
            ?>
            <div class=" w3-display-container w3-row   w3-container">
                <?php
                $cropToQuery = $rows2['CropName'];
                $qry5 = "SELECT img1.image FROM crop NATURAL JOIN img1 WHERE crop.CropName = '$cropToQuery'";

                $res5 = $db_connect->query($qry5) or die('bad query 5');
                $rows5 = $res5->fetch_assoc();

                echo '<img src="data:image/jpeg;base64,' . base64_encode($rows5['image']) . '"/>';
                ?>
                <p></p>
                <!--<img src="buysell.jpg""> -->
                <div class="w3-display-topleft w3-text-white" style="padding:0px 28px">
                    <h1 class="w3-jumbo w3-hide-small"><?php echo $rows2['CropName']; ?></h1>
                    <p>
                        <a class="w3-display-middle-left w3-xlarge"> <?php echo "Profit : " . $rows2['profit'] . " (Based on " . $rows2['DistrictName'] . " )"; ?> </a>
                        <br>
                        <a class="w3-display-middle-left w3-xlarge"> <?php echo "Harvest After : " . $rows2['FirstHarvest'] . " months"; ?> </a>
                    </p>
                </div>

                <div class="w3-display-middleright w3-text-white" style="padding:0px 250px">
                    <p><a href="seed.html"
                          class="w3-display-top-right w3-button  w3-round-xxlarge w3-green w3-padding-medium w3-large">Buy Seed</a>
                        <a href="./FindInfo/InfoMainP1.html"
                           class="w3-display-top-right w3-button w3-green w3-round-xxlarge w3-padding-medium w3-large">Information</a>
                    </p>
                    <br>
                    <br>
                </div>
            </div>

            <?php
        }
        }
        ?>

        <br><br><br><br><br>
        <br>
        <br>
        <br>
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