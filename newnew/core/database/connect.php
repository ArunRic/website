<?php
$connect_error = 'sorry no connect';
mysql_connect('localhost', 'root','qwe123') or die($connect_error);
mysql_select_db('lr') or die($connect_error);
?>