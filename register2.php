<?php
 if(!empty($_FILES['cardid']['name'])){
        $cardid = $_FILES['cardid']['name'];
        move_uploaded_file($_FILES['cardid']['tmp_name'], "images/" . $cardid);
    }
extract($_POST);
$pass = $_POST['pass'];
require_once 'connection.php';
$query = "insert into client values ('$fn', '$mn', '$ln', '$pass', '$cardid', '$phone_number')";
$result = mysqli_query($con, $query);

if(!$result){
    setcookie('error', 'You should choose another firstname or middle name or last name!');
    header("location:register.php");
}
else {
    session_start();
    $_SESSION['isloggedin'] = 1;
    $_SESSION['fn'] = $fn;
    $_SESSION['mn'] = $mn;
    $_SESSION['ln'] = $ln;
    header("location:client.php");
}
?>
