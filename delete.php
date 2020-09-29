<?php
include('database_connection.php');
$id=$_POST["id"];
$sql="delete from tbl_employee where id={$id}";
$result=mysqli_query($conn,"select images from tbl_employee where id={$id}");
$row=mysqli_fetch_assoc($result);
if(unlink("images/".$row['images'])){
	if(mysqli_query($conn,$sql)){
		echo json_encode(array("message"=>"Delete successfully","status"=>true));
	}
}
?>