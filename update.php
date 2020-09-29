<?php  
   $conn=mysqli_connect("localhost","root","","testing") or die("connection failed");
   if(($_POST['update_id'] !='' && $_POST['name'] !='' && $_POST['address'] !='' && $_POST['gender'] !='' && $_POST['designation'] !='' && $_POST['age'] !='') && ($_FILES['file']['name'] != '' || $_FILES['file']['name'] == ''))  
   {  
       if($_FILES['file']['name']==''){
            $sql="update tbl_employee set name='{$_POST['name']}',address='{$_POST['address']}',gender='{$_POST['gender']}',designation='{$_POST['designation']}',age='{$_POST['age']}' where id={$_POST['update_id']}";  
            if(mysqli_query($conn,$sql)){
                echo json_encode(array('message'=>$_POST['name'].',your record is updated','status'=>true));
              //echo $_POST['name'].',your data is updated';
            }
        }
        if($_FILES['file']['name'] !=''){
            $result=mysqli_query($conn,"select images from tbl_employee where id={$_POST['update_id']}");
            $row=mysqli_fetch_assoc($result);
            if(unlink("images/".$row['images'])){
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
                        $sql="update tbl_employee set name='{$_POST['name']}',address='{$_POST['address']}',gender='{$_POST['gender']}',designation='{$_POST['designation']}',age='{$_POST['age']}',images='{$new_name}' where id={$_POST['update_id']}";  
                        if(mysqli_query($conn,$sql)){
                            echo json_encode(array('message'=>$_POST['name'].',your record is updated','status'=>true));
                        }
                        
                    }  
                
                }  
                else{
                    echo json_encode(array('message'=>'upload only image','status'=>false));  
                }
            }
            

        }
        

    }
