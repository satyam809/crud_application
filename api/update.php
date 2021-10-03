<?php
include '../oops.php';


if ($_FILES['file']['name'] == '') {

    if ($obj->update_form_data($_POST['update_id'], $_POST['name'], $_POST['address'], $_POST['gender'], $_POST['designation'], $_POST['age'])) {
        //echo json_encode(array('message' => 'test', 'status' => false));
        //die;
        echo json_encode(array('message' => $_POST['name'] . ',your record is updated', 'status' => true));
        //echo $_POST['name'].',your data is updated';
    } else {
        echo json_encode(array('message' => $_POST['name'] . ',your record is not updated', 'status' => false));
    }
}
if ($_FILES['file']['name'] != '') {
    //echo json_encode(array('message' => 'test', 'status' => false));
    //die;
    $result = $obj->con->query("select images from tbl_employee where id='{$_POST['update_id']}'");
    //echo $result;
    //die;
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if (unlink(SITE_ROOT . "/images/{$row['images']}")) {
        $tmp = $_FILES['file']['name'];
        $check = explode(".", $tmp);
        $extension = end($check);
        $allowed_type = array("jpg", "jpeg", "png", "gif");
        if (in_array($extension, $allowed_type)) {
            $new_name = rand() . "." . $extension;
            $path = SITE_ROOT . "/images/{$new_name}";
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $sql = "update tbl_employee set name='{$_POST['name']}',address='{$_POST['address']}',gender='{$_POST['gender']}',designation='{$_POST['designation']}',age='{$_POST['age']}',images='{$new_name}' where id={$_POST['update_id']}";
                if ($obj->con->query($sql)) {
                    echo json_encode(array('message' => $_POST['name'] . ',your record is updated', 'status' => true));
                }
            }
        } else {
            echo json_encode(array('message' => 'upload only image', 'status' => false));
        }
    }
}
