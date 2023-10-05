<?php
session_start();
if($_SESSION['isloggedin'] != 1){
    header("location:index.php");
}

$msg = '';
if(isset($_COOKIE['order_msg'])){
    $msg = $_COOKIE['order_msg'];
    setcookie("order_msg", "",  -1234);
}
?>
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

td {
     padding-left : 40px;
/* padding-right: 20px;*/
    padding-bottom: 20px;
    border : none;
    font-family: "Lucida Console", "Courier New", monospace;
    color: #6666FF;  
}


.btn {
    margin-left: 50px; 
    margin-top: 20px;
    padding : 10px;
    background-color: #ccff99;
    border-radius: 50px 20px;
    width : 330px;
    font-size: 14px;
}

input {
    width : 150px;
    background-color: 	#90EE90;
    border-radius: 15px;
    border-width : 2px;
}

h2{
  color: #6666FF;  
  position : relative;
  left : 50px;
}

#dailyPrices {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#dailyPrices td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#dailyPrices tr:nth-child(even){background-color: #f2f2f2;}

#dailyPrices tr:hover {background-color: #ddd;}

#dailyPrices th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}


/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
  left : 450px;
  top : -40px;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
   border-radius: 15px;
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

h3 {
    color : #f25a0f;
}

.samePrices{
    background-color: #1bab42;
    position : relative;
    left : 100px;
    top : 20px;
    width : 350px;
}


.footer {
    background-color: #25d6d9;
    text-align : center;
    color : #244f31;
}

#previous {
    position : relative;
    left : 400px;
    top : -75px
    
}

</style>        
    


</head>
<body>
<div id='header'>    
    <a href="" style="margin-left: 100px;"><img src="GKpetroleum.png"/></a>
    <a href="https://www.instagram.com/" style="margin-left: 15px;"><img src="insta.png"></a>
    <a href="https://www.youtube.com/" style="margin-left :5px;"><img src='youtube.png' /></a>
    <div style='position:relative; left:1000px; bottom : 100px; margin-right: 412px; '>
        <a href='admin/logout.php' style='margin-left : 20px;'>logout</a>
    </div>
</div>    
    <div class="main" style="background-color: #e6ffee; padding-bottom: 70px; ">
        <br>
        
        <?php
            if(isset($_SESSION['fn'])) { 
                extract($_SESSION);  
                if($msg == ""){
                    echo "<h2>      Welcome $fn $mn $ln in the client page</h2>";
                }
                else {
                    echo "<h2> $msg </h2>";
                }
            }
        ?>
        
                          
        <!--View all the daily fuel prices of the selected month-->        
       <form action='client.php' method='post'> 
            <input type='submit' value='View all the daily fuel prices of the selected month' class='btn'/>
            <div class="custom-select" style="width:200px;">
                <select name="month">
                  <option value="00" selected>Select month:</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
            </div>
        </form>             
            <?php
                if(isset($_POST['month']) && $_POST['month'] != "00"){
                    require_once 'connection.php';
                    $year = date("Y");
                    $month = $_POST['month'];
                    if(checkdate($month, 31, $year)) {
                        $day=31;
                    }
                    else {
                        $day = 30;
                    }
                    $day1 = date("$year-$month-01");
                    $day2 = date("$year-$month-$day");
                    $query = "SELECT * FROM fueldailyprices WHERE day BETWEEN '$day1' AND '$day2'  ";
                    $result = mysqli_query($con, $query);
                    $num = mysqli_num_rows($result);
                     ?>
                    <script>alert(<?php echo "'$num'" ;?>); </script>
            
                     <?php  
                     if($num>0){
                     echo "<table id='dailyPrices'>"
                                . "<tr>"
                                    . "<th>Day</th><th>Un95</th><th>Un98</th><th>Diesel</th><th>Dolar rate</th>"
                                . "</tr>";
                     for($i=0; $i<$num; $i++){
                            $row = mysqli_fetch_assoc($result);
                            $day = $row['day'];
                            $un95_sell = $row['un95_sell_L'];
                            $un98_sell = $row['un98_sell_L'];
                            $diesel_sell = $row['diesel_sell_L'];
                            $dolar_rate = $row['dolar_rate'];
                            echo "<tr>"
                                    . "<td>$day</td><td>" . number_format($un95_sell) . "</td><td>" . number_format($un98_sell) . "</td><td>" . number_format($diesel_sell) . "</td><td>". number_format($dolar_rate) ."</td>"
                               . "</tr>"   ;
                                }
                     echo "</table>";
                     }
                     else echo "<h3>There no prices for this month, please select another one.</h3>";
                }
            ?>
                    
                    
                   <!--View all the daily calculations of the selected month--> 
        <form action='client.php' method='post'>    
            <input type='submit' value='View all the debts of the selected month' class='btn'/>
            <div class="custom-select" style="width:200px;">
                <select name="month1">
                  <option value="00" selected>Select month:</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
            </div>
        </form>      
        
        <?php
                if(isset($_POST['month1']) && $_POST['month1'] != "00" ) {
                    require_once 'connection.php';
                    $year = date("Y");                   
                    $month = $_POST['month1'];
                    $day1 = date("$year-$month-01");
                    if(checkdate($month, 31, $year)){
                        $lday = 31;
                    }
                    elseif(checkdate($month, 30, $year)) {
                        $lday = 30;
                    }
                    elseif(checkdate($month, 29, $year)){
                        $lday = 29;
                    }
                    else {
                        $lday = 28;
                    }
                    $day2 = date("$year-$month-$lday");
                    $query = "SELECT * FROM debt WHERE first_name='$fn' and middle_name='$mn' and last_name='$ln' and day BETWEEN '$day1' AND '$day2'  ";
                    $result = mysqli_query($con, $query);
                    $num = mysqli_num_rows($result);
                     ?>
                    <script>alert(<?php echo "'$num'" ;?>); </script>

                     <?php  
                     if($num>0){
                     echo "<table id='dailyPrices'>"
                                . "<tr>"
                                    . "<th>Day</th><th>Time</th><th>Amount</th><th>Fuel</th><th>Status</th><th>By who</th>"
                                . "</tr>";
                     $total_paid = 0.0;
                     $total_unpaid = 0.0;
                     for($i=0; $i<$num; $i++){
                            $row = mysqli_fetch_assoc($result);
                            $day = $row['day'];
                            $time = $row['time'];
                            $amount = $row['amount_dolar'];
                            $fuel = $row['fuel'];
                            $status = $row['status'];
                            if(strcmp($status, "paid") == 0) {
                                $total_paid += $amount;
                            }
                            else {
                                $total_unpaid += $amount;
                            }
                            $by_who = $row['by_who'];
                            echo "<tr>" 
                                    . "<td>$day</td><td>$time</td><td>". number_format($amount)  ."</td><td>$fuel</td><td>$status</td><td>$by_who</td>"
                               . "</tr>"   ;
                                }
                            echo "<tr>"
                                    . "<td colspan='2' class='footer'>Total unpaid</td><td class='footer'>$total_unpaid</td><td class='footer' colspan='2'>Total paid</td><td class='footer'>$total_paid</td>"
                                . "</tr>";    
                     echo "</table>";
                     }
                     else echo "<h3>There is no debts for this month.</h3>";
                }
                //}
            ?>            
        <form action='order.php' method='post'>
            <input type='submit' value='Make a diesel order' class='btn'/>
        </form>
                    
        <form action='client.php' method='post'>
            <input type='text' name='previous' value='yes' hidden/>
            <input type='submit' value='View previous orders' id='previous' class='btn'/>
        </form>            

        <?php
        if(isset($_POST['previous'])) {
            require_once 'connection.php';
            $query = "select * from `order` where first_name='$fn' and middle_name='$mn' and last_name='$ln' ";
            $result = mysqli_query($con, $query);
            $num = mysqli_num_rows($result);
            if($num != 0){
                echo "<table id='dailyPrices'>" ;
                echo "<tr><th>Date</th><th>Quantity</th><th>Address</th><th>Status</th></tr>";
                for($i=0; $i<$num ; $i++){
                    $row = mysqli_fetch_assoc($result);
                    $day = $row["date"];
                    $quantity = $row["quantity"];
                    $address = $row['address'];
                    $status = $row['status'];
                    echo "<tr><td>$day</td><td>$quantity</td><td>$address</td><td>$status</td></tr>";
                }
                echo "</table>";
            }
        }
        ?>
                    
                    
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>                 
                    
        
            
</div>    
<div class="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='help.php'>How can we help?</a>
    </p>
</div>    
  
</body>
    
</html>
