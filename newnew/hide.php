<?php
include_once('storecon.php');
require ('core/init.php');

$id = $_SESSION['user_id'];
$tpref = $_POST['pref'];
$hide = 1;
echo $tpref;
echo $id;

if(!empty($tpref))
{
	
$sql = "UPDATE  `users` 
                 SET `user_pref` = '{$hide}'
                       WHERE user_id = '{$id}'";

if (!mysql_query($sql)) { 
    echo "Something went wrong! :(";
}
else
{
	header('location:index.php');
}
}

?>
<a href="index.php">Done</a>