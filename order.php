<?php
session_start();
if($_SESSION['isloggedin']!=1){
    header("location:index.php");
}
require_once 'connection.php';
if(isset($_POST['email']) && $_POST['email'] != "" &&   
    isset($_POST['qty']) && $_POST['qty'] != "" ){
    require_once 'connection.php';
        extract($_POST);
        extract($_SESSION);
        $today = date("Y-m-d");
        $query = "insert into `order` values (null, '$today', '$fn', '$mn', '$ln', 'diesel', '$qty', '$address', '$location', '$email', '$phone', 'pending', '$cardNum', '$expires', '$cvv')";
        $result = mysqli_query($con, $query);
        if($result){ 
            setcookie("order_msg", "Order sent sucessfully!");
            echo  "<script> alert('Order sent successfully!'); </script>";
        }
        else {
            echo  "<script> alert('Can not send order!'); </script>";  
        }
        header("location:client.php");
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

tr {
    font-family:'Courier New';
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
}

input {
    width : 250px;
    background-color: 	#90EE90;
    border-radius: 15px;
    border-width : 2px;
}

h2{
  color: #6666FF;  
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

#dailyPrices tr.footer {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #03fcdf;
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

.un95 {
    padding-top: 10px;
}

.links {
    position:relative; 
    left:1000px; 
    bottom : 100px; 
    margin-right: 412px; 
}

.update {
    position : relative;
    top : -100px;
    left : 800px;
    width : 200px;
    padding : 10px;
    background-color: #ccff99;
    border-radius: 50px 20px;
}

</style>
</head>
<body>
<div id='header'>    
    <a href="" style="margin-left: 100px;"><img src="GKpetroleum.png"/></a>
    <a href="https://www.instagram.com/" style="margin-left: 15px;"><img src="insta.png"></a>
    <a href="https://www.youtube.com/" style="margin-left :5px;"><img src='youtube.png' /></a>
    <div class='links' >
        <a href='client.php' style='margin-left : 20px;'>Previous</a>
        <a href='admin/logout.php' style='margin-left : 20px;'>logout</a>
    </div>
</div>    
    <div class="main" style="background-color: #e6ffee; padding-bottom: 70px; ">
        <br>
        <!--Unleaded 95-->
        
        <hr>
        <form action='order.php' method='post'>
        <table class="un95">
            <tr>
                 <td>Book your order here : </td>
                 <td> </td>
            </tr> 
            <tr>
                 <td>Email :  </td><!-- comment -->
                 <td> <input type='text' name='email'  /></td>
            </tr>
            <tr>
                 <td> Phone number : </td><!-- comment -->
                 <td> <input type='text' name='phone'  /></td>
            </tr>  
            <tr>
                 <td> Quantity :  </td><!-- comment -->
                 <td> <input type='text' name='qty'/></td>
            </tr>  
            <tr>
                 <td> Address : </td><!-- comment -->
                 <td> <input type='text' name='address'/></td>
            </tr>
            <tr>
                 <td> Location link :  </td><!-- comment -->
                 <td> <input type='text' name='location'/></td>
            </tr>
            <tr>
                <td colspan='2'>
                    Payment card
                </td> 
            </tr>
            <tr>
                 <td> Number :  </td><!-- comment -->
                 <td> <input type='text' name='cardNum'/></td>
            </tr>
            <tr>
                 <td> Expires :  </td><!-- comment -->
                 <td> <input type='text' name='expires'/></td>
            </tr>
             <tr>
                 <td> CVV :  </td><!-- comment -->
                 <td> <input type='text' name='cvv' placeholder="Security code"/></td>
            </tr>
            <tr>
                <td>
                    <input type='submit' value='Submit' />
                </td>
            </tr>
        </table> 
        </form>    
        
</div>    
<div class="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='help.php'>How can we help?</a>
    </p>
</div>    
  
</body>
    
</html>

