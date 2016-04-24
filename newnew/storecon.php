<?php
$connect_error = 'sorry no connect';
mysql_connect('localhost', 'root', 'root') or die($connect_error);
mysql_select_db('lr') or die($connect_error);
mysql_set_charset('utf-8');

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "lr";
$connection =  mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($connection,'utf-8');

?>