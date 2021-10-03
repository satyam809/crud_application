<?php
session_start();
require 'config.php';
class Admin
{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function fetch_data($offset, $limitPerPage)
    {
        $sql = "select * from tbl_employee order by id desc limit {$offset},{$limitPerPage}";
        $result = $this->con->query($sql);
        return $result;
    }
    public function single_fetch_data($id)
    {
        $sql = "select * from tbl_employee where id={$id}";
        $result = $this->con->query($sql); //print_r($result);die;
        return $result;
    }
    public function insert_form_data($name, $address, $gender, $designation, $age, $new_name)
    {
        $sql = "insert into tbl_employee(name,address,gender,designation,age,images) 
                    values('{$name}','{$address}','{$gender}','{$designation}','{$age}','{$new_name}')";

        if ($this->con->query($sql)) {

            return true;
        } else {

            return false;
        }
    }
    public function update_form_data($update_id, $name, $address, $gender, $designation, $age)
    {
        $sql = "update tbl_employee set name='{$name}',address='{$address}',gender='{$gender}',designation='{$designation}',age='{$age}' where id={$update_id}";
        if ($this->con->query($sql)) {
            return true;
        }
    }
    public function delete_form_data($delete_id)
    {
        $sql = "delete from tbl_employee where id={$delete_id}";
        $result = $this->con->query("select images from tbl_employee where id={$delete_id}");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (unlink(SITE_ROOT . "/images/{$row['images']}")) {
            if ($this->con->query($sql)) {
                return true;
            }
        }
    }
    public function multiple_delete($str)
    {
        $sql = "delete from tbl_employee where id in($str)";
        if ($this->con->query($sql)) {
            return true;
        }
    }
    public function search($search)
    {
        $sql = "select * from tbl_employee where name like '%{$search}%' or address like '%{$search}%' or gender like '%{$search}%' or designation like '%{$search}%' or age like '%{$search}%'";
        $result = $this->con->query($sql);
        return $result;
    }
    public function pagination()
    {
        $sql_total = "select * from tbl_employee";
        $records = $this->con->query($sql_total);
        return $records->rowCount();
    }
}
$obj = new Admin();
