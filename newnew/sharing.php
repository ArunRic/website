<?php 
include_once('storecon.php');

$id = $_POST['id'];
$shareid = (is_numeric($_POST['shareid']) ? (int)$_POST['shareid'] : 0);


if(!empty($shareid))
{
	
$sql = "UPDATE  `filestore` 
                 SET `shared` = '{$shareid}'
                       WHERE id = '{$id}'";

if (!mysql_query($sql)) { 
    echo "Something went wrong! :(";
    	echo $id;
    	echo $shareid;
}
else
{
	header('location:index.php');
}
}
?>