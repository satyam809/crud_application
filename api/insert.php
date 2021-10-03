<?php
require('../oops.php');

if ($_POST['name'] != '' && $_POST['address'] != '' && $_POST['gender'] != '' && $_POST['designation'] != '' && $_POST['age'] != '' && $_FILES['file']['name'] != '') {
    $tmp = $_FILES['file']['name'];
    $check = explode(".", $tmp);
    $extension = end($check);
    $allowed_type = array("jpg", "jpeg", "png", "gif");
    if (in_array($extension, $allowed_type)) {
        $new_name = rand() . "." . $extension;
        $path = SITE_ROOT . "/images/{$new_name}";
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            if ($obj->insert_form_data($_POST['name'], $_POST['address'], $_POST['gender'], $_POST['designation'], $_POST['age'], $new_name)) {
                echo json_encode(array('message' => $_POST['name'] . ',Your Record Inserted.', 'status' => true));
            } else {
                echo json_encode(array('message' => $_POST['name'] . ',Your Record Not Inserted.', 'status' => false));
            }
        }
    } else {
        echo json_encode(array('message' => '<script>alert("Invalid File Formate")</script>', 'status' => false));
    }
}
