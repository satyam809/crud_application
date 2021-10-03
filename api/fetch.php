
<?php
include('../oops.php');
$limitPerPage = 5;
if (isset($_POST['page_no'])) {
  $page = $_POST['page_no'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limitPerPage;
$result = $obj->fetch_data($offset, $limitPerPage);
$output = $result->fetchAll(PDO::FETCH_ASSOC);

if ($output != "") {
  echo json_encode($output);
} else {
  echo json_encode(array('message' => 'No record found', 'status' => false));
}


?>