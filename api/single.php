<?php
include('../oops.php');
$result = $obj->single_fetch_data($_POST['id']);
if ($result->rowCount() > 0) {

	$output = $result->fetchAll();
	echo json_encode($output);
} else {

	echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
