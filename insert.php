<?php  
 
 include('database_connection.php');
   if($_POST['name'] !='' && $_POST['address'] !='' && $_POST['gender'] !='' && $_POST['designation'] !='' && $_POST['age'] !='' && $_FILES['file']['name'] != '')  
   {  
        $tmp=$_FILES['file']['name'];
        $check=explode(".",$tmp);
        $extension = end($check);  
        $allowed_type = array("jpg", "jpeg", "png", "gif");  
        if(in_array($extension, $allowed_type))  
        {  
        $new_name = rand() . "." . $extension;  
        $path = "images/" . $new_name;  
            if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
            {  
                $sql="insert into tbl_employee(name,address,gender,designation,age,images) 
                values('{$_POST['name']}','{$_POST['address']}','{$_POST['gender']}','{$_POST['designation']}','{$_POST['age']}','{$new_name}')";  
                if(mysqli_query($conn,$sql)){
                    echo json_encode(array('message' => $_POST['name'].',Your Record Inserted.','status' => true));
                
                }
                else{
                    echo json_encode(array('message' => $_POST['name'].',Your Record Not Inserted.','status' => false));
                }
            }  
        
        }  
        else{
            echo json_encode(array('message' => '<script>alert("Invalid File Formate")</script>','status' => false));  
        }

    }  
?>  