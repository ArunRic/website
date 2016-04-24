<?php 
include_once('storecon.php');

$id    = $_POST['id'];
$file = addslashes(file_get_contents($_FILES['file']['tmp_name'])); 
$file_name = addslashes($_FILES['file']['name']);
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];

if(!empty($file_name))
{
	
$sql = "UPDATE  `filestore` 
                 SET `file` = '{$file}',
                     `file_name` = '{$file_name}', `type` = '{$file_type}', `size` = '{$file_size}'  WHERE id = '{$id}'";

if (!mysql_query($sql)) { 
    echo "Something went wrong! :("; 
}
else
{
	header('location:index.php');
}
}
?>
