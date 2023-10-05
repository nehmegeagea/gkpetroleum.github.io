<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">    
<style>
a:link {
  color: green;
  background-color: transparent;
  text-decoration: green;
}
a:visited {
  color: green;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: green;
  background-color: transparent;
  text-decoration: none;
}
a:active {
  color: green;
  background-color: transparent;
  text-decoration: none;
}


table {
    padding-top : 50px;
    /*padding-left : 10 px;*/
}

.today_prices th {
    color : #7a9e7a;
    font-size: 20px;
    width : 300px; 
    height : 60px;
    text-align: center;
    font-family: "Audiowide", sans-serif;
    border-left: 1px solid #25d6d9; 
}

.date {
    position : relative;
    top : 50px;
    left : 100px;
    color : #7a9e7a;
    font-size: 20px;
    font-weight : bold;
    font-family: "cursive", sans-serif;
}

h1 {
    position : relative;
    left : 100px;
    color : green;
}


.google-map {
     padding-bottom: 30%;
     position: relative;
}

.google-map iframe {
     height: 70%;
     width: 70%;
     left: 50px;
     top: 0;
     position: absolute;
}

.gk {
    position : relative;
    left: 50px;
}

.links {
    position:relative; 
    left:400px; 
    bottom : 100px; 
    margin-right: 412px; 
}

</style>
</head>
<body>
<div id='header'>    
    <img class='gk' src="GKpetroleum.png"/>
    <a href="https://www.instagram.com/" style="margin-left: 15px;"><img src="insta.png" class='gk'></a>
    <a href="https://www.youtube.com/" style="margin-left :5px;"><img src='youtube.png' class='gk'/></a>
    <div class="links">
        <a href='aboutUs.php' style='margin-left: 400px;'>About us</a>
        <a href='help.php' style='margin-left: 20px;'>Support</a>
        <a href='login.php' style='margin-left: 20px;'>Login</a>
        <a href='register.php' style='margin-left: 20px;'>Register</a>
        <a href='admin/index.php' style='margin-left : 20px;'>Admin</a>
    </div>
</div>    
    <div class="main" style="background-color: #e6ffee; padding-bottom: 70px; ">
        <table class="today_prices">
            <tr style="font-family:'Courier New'">
                <?php
                    require_once 'connection.php';
                    $hour = date("H") + 3;
                    $fullday = date("l jS \of F Y $hour:i ") . "<br>";;
                    echo "<p class='date'>$fullday<p>";
                    $day = date("Y-m-d");
                    $query = "select * from fuelDailyPrices where day ='$day' ";
                    $result = mysqli_query($con, $query);
                    $num = mysqli_num_rows($result);
                    if($num>0){
                        $row = mysqli_fetch_assoc($result);
                        $un95S_L = $row['un95_sell_L'];
                        $un98S_L = $row['un98_sell_L'];
                        $dieselS_L = $row['diesel_sell_L'];
                        $un95S_D = $row['un95_sell_$'];
                        $un98S_D = $row['un98_sell_$'];
                        $dieselS_D = $row['diesel_sell_$'];
                        $dolarRate =  $row['dolar_rate'];
                        echo "<tr>";
                            echo "<th>Today fuel prices </th>" ;
                            echo "<th>Unleaded95  ". number_format($un95S_L) ." l.l.</th>";
                            echo "<th>Unleaded98  ". number_format($un98S_L) ." l.l.</th>";
                            echo "<th>Diesel  ". number_format($dieselS_L) ." l.l.</th>";
                        echo "</tr>"; 
                        echo "<tr>";
                            echo "<th>Prices in dolar</th>" ;
                            echo "<th>Unleaded95  ". number_format($un95S_D, 2) ." $ </th>";
                            echo "<th>Unleaded98  ". number_format($un98S_D, 2) ." $ </th>";
                            echo "<th>Diesel  ". number_format($dieselS_D, 2) ." $</th>";
                        echo "</tr>"; 
                        echo "<tr>";
                            echo "<th>Today dolar rate  </th>" ;
                            echo "<th>1$ = ". number_format($dolarRate) ." l.l.</th>";
                        echo "</tr>"; 
                    }
                    else {
                        echo "<th colspan='4'>There no prices entered by the admin for today!</th>";
                    }
                ?>
            </tr>
        </table>
        
        <br/>
        <hr>
        
        <table>
            <tr>
                <td colspan="2" style="padding: 0px;"><img src="picture1"/></td>
                <td colspan="2" style="padding: 0px;"><img src="picture2"/></td>
            </tr>
        </table>
        <br><br>
        <hr><br><br>
        
            <h1>Our first branch in Zahle</h1>
            <div class='google-map'>
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d828.5804855897782!2d35.9073494!3d33.8298072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f34d6d6d06977%3A0x72bb60b012ab60c8!2sGK%20PETROLEUM%20(%20Gas%20Station%20)!5e0!3m2!1sen!2slb!4v1692097168724!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <hr>
            <h1>Our second branch in Barka</h1>
            <div class='google-map'>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d586.8150037804394!2d36.1520060761912!3d34.178464988296774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1522098833a2a0df%3A0x7f5949d577fd411a!2sMedco!5e0!3m2!1sen!2slb!4v1692098476423!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
</div>
<div class="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='help.php'>How can we help?</a>
    </p>
</div>    
  
</body>
    
</html>
