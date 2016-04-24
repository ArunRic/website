<?php 
include_once('storecon.php');
require ('core/init.php');
//remember this is mysqli
$conn =  mysqli_connect("localhost","root","root","lr")
                             or die('Database conn Failed');
             mysqli_set_charset($conn,'utf-8');

$u_id = $_SESSION['user_id'];

include_once 'storecon.php';
if($_FILES['file']['size'] < 10485760)
{    
    $filename = addslashes($_FILES['file']['name']);
    $temp = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $type = addslashes($_FILES['file']['type']);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $fp      = fopen($temp, 'r');
    $fcont = fread($fp, filesize($temp));
    $fcont = addslashes($fcont);
    fclose($fp);
    if($extension=="png"||$extension=="PNG"||$extension=="JPG"||$extension=="jpg"||$extension=="jpeg"||$extension=="JPEG"
        ||$extension=="pdf"||$extension=="PDF"||$extension=="doc"||$extension=="DOC"||$extension=="docx"||$extension=="DOCX"
        ||$extension=="XLS"||$extension=="xls"||$extension=="XLSX"||$extension=="xlsx"||$extension=="xlsm"||$extension=="XLSM")
    {
     $sql="INSERT INTO filestore(file_name,type,u_id,size,file) VALUES('$filename','$type','$u_id','$size','$fcont')";
        $i=mysqli_query($conn,$sql);
        if ($i==1)
        {
            ?>
        
        <script>
        alert('upload successful');
        window.location.href='index.php?success';
        </script>
        <?php
        mysqli_close($conn);
        }
    else
        {
        ?>
        <script>
        alert('Error');
        window.location.href='index.php?fail';
        </script>

        <?php 
        mysqli_close($conn);
        }       
    
}
else
{  mysqli_close($conn);
    ?>
        <script>
        alert('please check file format');
        window.location.href='index.php?fail';
        </script>
<?php
    
}
}
?>