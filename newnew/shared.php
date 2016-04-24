<?php 
include_once('storecon.php');
if(isset($_GET['rowid']))
{
	$id = $_GET['rowid'];
	$row = mysql_fetch_object(mysql_query("SELECT * FROM filestore WHERE id = '$id'"));
}
?>
<h5>You are sharing</h5>
<form action="sharing.php" method="POST" >
    Share with<input type="text" name="shareid">
    <img width="50" height="50" src="data:file/jpg;base64,<?php echo base64_encode($row->file) ?>" />
    <input type="hidden" value="<?= $row->id ?>" name="id">
    <input type="submit" />
</form>
<a href="index.php">Back to all files</a>
