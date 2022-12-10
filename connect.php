<?php
$connection = mysqli_connect("localhost","root","","cloudc");
if(!$connection){
echo "<script>alert('error connected');</script>";
echo "error".mysqli_connect_errno();
}
?>