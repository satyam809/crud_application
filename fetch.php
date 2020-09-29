
<?php
include('database_connection.php');
$sql="select * from tbl_employee order by id desc";
$result=mysqli_query($conn,$sql) or die("sql query failed");
if (mysqli_num_rows($result) > 0) {
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    
   //echo '<pre>',print_r($output,1),'</pre>';
   echo json_encode($output);
}
else{
  echo json_encode(array('message'=>'No record found','status'=>false));
}


?>