<?php 
include 'database_connection.php';
$id=$_POST['id'];
$str=implode(",",$id);
$sql="delete from tbl_employee where id in($str)";
if(mysqli_query($conn,$sql) or die("query failed")){
    echo json_encode(array("message"=>"Delete successfully","status"=>true));
}

?>