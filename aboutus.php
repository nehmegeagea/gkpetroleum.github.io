

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

p.aboutUs {
    padding: 50px; 
    padding-left:100px; 
    padding-right: 100px; 
    font-size:30px; 
    text-align: left; 
    color: green; 
    margin:0px; 
    font-family: Arial, Helvetica, sans-serif;
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
  <?php
    $filename = "aboutUs.txt";
    echo "<p class='aboutUs' style=''>".file_get_contents($filename)."</p>";
  ?>     
          
</div>
    
<div class="">
    <a href="">
    <p style='font-size:60px; text-align: center; color: green; margin:0px; font-family: fantasy, Helvetica, sans-serif;'>
        <a href='help.php'>How can we help?</a>
    </p>
    </a>
</div>      
</body>
    
</html>