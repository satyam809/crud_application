<?php
include('database_connection.php');
$search=$_POST['search'];
$sql="select * from tbl_employee where name like '%{$search}%' or address like '%{$search}%' or gender like '%{$search}%' or designation like '%{$search}%' or age like '%{$search}%'";
$result=mysqli_query($conn,$sql) or die("sql query failed");
if (mysqli_num_rows($result) > 0) {
  
    $output='';
      $i=1;
      while($row=mysqli_fetch_assoc($result)){
        $output.="<tr>
        <td>{$i}</td>
        <td>{$row['name']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['designation']}</td>
        <td>{$row['age']}</td>
        <td><button type='button' name='view' id='".$row['id']."' class='btn btn-primary btn-xs view'>View</button></td>
        <td><button type='button' name='update' id='".$row['id']."' class='btn btn-warning btn-xs update'>Update</button></td>
        <td><button type='button' name='delete' id='".$row['id']."' class='btn btn-danger btn-xs delete'>Delete</button></td>
        </tr>";
        $i++;
      }
      echo $output;
}
else{
      echo "<h2>No record</h2>";
}
?>