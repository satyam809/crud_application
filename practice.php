<?php
$con = mysqli_connect("localhost", "root", "", "testing");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * from tbl_employee";

if ($result = mysqli_query($con, $sql)) {
  while ($obj = mysqli_fetch_array($result)) {
    printf("%s (%s)\n", $obj['name'], $obj['address']);
  }
  mysqli_free_result($result);
}

mysqli_close($con);
