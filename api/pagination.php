
<?php
// pagination
include('../oops.php');
$limitPerPage = 5;
$total_records = $obj->pagination();
$total_pages = ceil($total_records / $limitPerPage);
echo json_encode($total_pages);
?>