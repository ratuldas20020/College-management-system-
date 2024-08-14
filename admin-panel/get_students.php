<?php
include "../config.php";

$select = " SELECT * FROM students WHERE approved = 1";

$students_result = mysqli_query($conn, $select);

$students_data = array();

while ($row = mysqli_fetch_array($students_result)) {
    $students_data[] = $row;
}


echo json_encode($students_data);
