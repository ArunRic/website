<?php 
include_once('storecon.php');

$id = $_POST['id'];
$rename = $_POST['renameid'];


if(!empty($rename))
{
	
$sql = "UPDATE  `filestore` 
                 SET `file_name` = '{$rename}'
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