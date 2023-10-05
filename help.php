<?php

if(isset($_POST['fn']) && $_POST['fn'] != "") {
    require_once 'connection.php';
    extract($_POST);
    $today = date("Y-m-d");
    $query = "insert into `help` values(null, '$today', '$fn', '$mn', '$ln', '$email', '$phone', '$text', 'pending')";
    $result = mysqli_query($con, $query);
    if($result){
        ?>
        <script>alert("Request sent successfully") ;</script>
        <?php
    }
    else {
       ?>
        <script>alert("Please try again!") ;</script>
        <?php        
    }
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

.links {
    position:relative; 
    left:1000px; 
    bottom : 100px; 
    margin-right: 412px; 
}

table {
    padding-top : 50px;
    padding-left : 15 px;
    font-family: "Lucida Console", "Courier New", monospace;
}

td {
     padding-left : 50px;
/* padding-right: 20px;*/
    padding-bottom: 20px;
    border : none;
    font-family: "Lucida Console", "Courier New", monospace;
    text-decoration: 
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
/* padding-right: 20px;*/
     font-family: "Audiowide", sans-serif;
    border : none;
}

.date {
    position : relative;
    top : 50px;
    left : 100px;
    color : #7a9e7a;
    font-size: 20px;
    font-weight: bold;
    font-family: "Audiowide", sans-serif;
}

th {
    position: relative;
    left : 50px;
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
        <form action='help.php' method='post' enctype="multipart/form-data">
        <table>    
            <tr>
                <td>First name : </td>
                <td> <input type='text' name='fn' required/> </td>
            </tr>
             <tr>
                <td>Middle name : </td>
                <td> <input type='text' name='mn'/> </td>
            </tr>
             <tr>
                <td>Last name : </td>
                 <td> <input type='text' name='ln' required/> </td>
            </tr>
             <tr>
                <td>Email : </td>
                <td> <input type='text' name='email' /> </td>
            </tr>
            <tr>
                <td>Phone number : </td>
                <td> <input type='text' name='phone' required/> </td>
            </tr>
             <tr>
                 <td colspan="2">Write down what you need for help : </td>
            </tr>
             <tr>
                 <td colspan="2"> <textarea name="text" rows="5" cols="100" required></textarea> </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Send' class='btn'/>
                </td>
            </tr>
        </table>
        </form>    
        <hr>
</div>    
<div class="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='index.php'>GK petroleum</a>
    </p>
</div>    
  
</body>
    
</html>

