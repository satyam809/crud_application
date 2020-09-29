<?php
///single.php

include('database_connection.php');


$sql="select * from tbl_employee where id={$_POST['id']}";
$result=mysqli_query($conn,$sql) or die("sql query failed");
if(mysqli_num_rows($result) > 0 ){
	
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($output);

}else{

echo json_encode(array('message' => 'No Record Found.', 'status' => false));

} 


   
?>