<?php
include '../oops.php';
$id = $_POST['id'];
$str = implode(",", $id);
if ($obj->multiple_delete($str)) {
    echo json_encode(array('message' => 'Delete successfully', 'status' => true));
}
