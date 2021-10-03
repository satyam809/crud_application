<?php
include('../oops.php');
if ($obj->delete_form_data($_POST["id"])) {
	echo json_encode(array("message" => "Delete successfully", "status" => true));
}
