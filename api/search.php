<?php
include('../oops.php');
if (!empty($_POST['search'])) {
  $result = $obj->search($_POST['search']);
  if ($result->rowCount() > 0) {

    $output = $result->fetchAll();

    //echo '<pre>',print_r($output,1),'</pre>';
    echo json_encode($output);
  } else {
    echo json_encode(array('message' => 'No record found', 'status' => false));
  }
} else {
  $sql = "select * from tbl_employee";
  $result = $obj->con->query($sql);
  $output = $result->fetchAll();
  echo json_encode($output);
}
