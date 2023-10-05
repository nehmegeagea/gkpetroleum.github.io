<?php

$hostname = 'localhost';
$username = 'root';
$password = 'Nehme#82$1350';
$database = 'gkpetroleum';

$con = mysqli_connect($hostname, $username, $password, $database);

if(mysqli_errno($con)){
    echo "failed to connect";
}
        
?>