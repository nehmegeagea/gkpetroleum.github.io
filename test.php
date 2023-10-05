<?php

//$int = '1750000';
//echo filter_var($int, FILTER_SANITIZE_NUMBER_INT);
$day = date('d') + 7;
$limit_date = date("$day-m-Y");
//echo "". $limit_date;

//Substring in php
$message = 'sent($) on 20-9-2023'; echo $message . "<br />";
$message2 = substr($message, 0, 7); echo $message2 . "<br />";

?>