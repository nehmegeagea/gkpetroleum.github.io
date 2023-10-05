<html>
<head>
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
    padding-left : 15 px;
    font-family: "Lucida Console", "Courier New", monospace;
}

.links {
    position:relative; 
    left:1000px; 
    bottom : 100px; 
    margin-right: 412px; 
}

td {
     padding-left : 50px;
/* padding-right: 20px;*/
    padding-bottom: 20px;
    border : none;
    font-family: "Lucida Console", "Courier New", monospace;
}


.btn {
    margin-left: 50px; 
    margin-top: 20px;
    padding : 10px;
    background-color: #ccff99;
    border-radius: 50px 20px;
}

input {
    width : 220px;
}

h2{
  color: #ff3333;  
}

.today_prices th {
    color : #7a9e7a;
    font-size: 17px;
    width : 300px; 
    height : 60px;
    text-align: center;
    font-family: "Audiowide", sans-serif;
    border-left: 1px solid #25d6d9; 
}

th {
    font-style: italic;
    color : #7a9e7a;
    font-size: 17px;
    padding-left : 50px;
    padding-bottom: 20px;
    font-family: "Audiowide", sans-serif;
    border : none;
}

.date {
    position : relative;
    top : 50px;
    left : 100px;
    color : #7a9e7a;
    font-weight: bold;
    font-size: 20px;
    font-family: "Audiowide", sans-serif;
}

hr {
    background-color: aqua;
}

</style>
</head>
<body>
<div id='header'>    
    <a href="" style="margin-left: 100px;"><img src="GKpetroleum.png"/></a>
    <a href="https://www.instagram.com/" style="margin-left: 15px;"><img src="insta.png"></a>
    <a href="https://www.youtube.com/" style="margin-left :5px;"><img src='youtube.png' /></a>
    <div class='links'>
        <a href='index.php' style='margin-left : 20px;'>Previous</a>
    </div>
</div>    
    <div class="main" style="background-color: #e6ffee; padding-bottom: 70px; ">
        <form action='login.php' method='post'>
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
        </table><!-- comment -->
        <br><!-- comment -->
        <hr><!-- comment -->
       
        
        <table>
            <tr>
                <td class='login'>First name : </td>
                <td class='login'> <input type='text' name='fn' placeholder="Nehme" /> </td>
            </tr>
             <tr>
                <td class='login'>Middle name : </td>
                <td class='login'> <input type='text' name='mn' /> </td>
            </tr>
            <tr>
                <td class='login'>Last name : </td>
                <td class='login'> <input type='text' name='ln' /> </td>
            </tr>
             <tr>
                <td class='login'>Password : </td>
                <td class='login'> <input type='password' name='pass' /> </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Go to client page' class='btn'/>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                <?php
                   if(isset($_COOKIE['error'])) {
                       $err=$_COOKIE['error'];
                       echo "<h2>$err</h2>"; 
                       setcookie('error', '',time()-2592000);}
                ?>
                </td>    
            </tr>
        </table>
        </form> 
        <hr>
</div>       
<div class="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='help.php'>How can we help?</a>
    </p>
</div>    
  
</body>
    
</html>


<?php
if(isset($_POST['fn']) && isset($_POST['mn']) && isset($_POST['ln'])) {
    extract($_POST);
    $pass = $_POST['pass'];
    require_once 'connection.php';
    $query="select * from client where first_name='$fn' and middle_name='$mn' and last_name='$ln' and password='$pass'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    if($num==0){
        setcookie('error', 'User not found!');
        header("location:login.php");
    }
    else {
        session_start();
        $_SESSION['fn'] = $fn;
        $_SESSION['mn'] = $mn;
        $_SESSION['ln'] = $ln;
        $_SESSION['isloggedin'] = 1;
        header("location:client.php");
    }
}
?>