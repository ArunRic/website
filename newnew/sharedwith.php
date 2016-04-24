<h2>Share with you</h2>
<table>
<thead>
	<tr>
		<th>ID</th>
		<th>File Name</th>
		<th>File</th>
		<th>Action</th>
	</tr>
</thead>
 <tbody>
 		<?php
 			$sql = mysql_query("SELECT * FROM filestore WHERE shared = '$u_id'");
 			while($row = mysql_fetch_object($sql))
 			{
 				?>
 					<tr>
 						<td><?= $row->id?></td>
 						<td><?= $row->file_name ?></td>
 						<td><img width="150" height="150" src="data:file/jpg;base64,<?php echo base64_encode($row->file) ?>" /></td>
 						<td><a href="index.php?id=<?= $row->id ?>">Delete</a>&nbsp;| &nbsp;<a href="edit.php?rowid=<?= $row->id ?>">Edit</a> | 
 							<a href="download.php?rowid=<?= $row->id ?>">Download</a> | <a href="shared.php?rowid=<?= $row->id ?>">Share</a>
 							| <a href="rename.php?rowid=<?= $row->id ?>">Rename</a></td>
 					</tr>
 				<?php 
 			}
 		?>
 </tbody>
</table>