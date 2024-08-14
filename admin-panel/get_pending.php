<?php
include "../config.php";


$select = " SELECT * FROM students WHERE approved = 0";

$pending_students_result = mysqli_query($conn, $select);

$pending_students_data = array();


while ($row = mysqli_fetch_array($pending_students_result)) {
    $pending_students_data[] = $row;
}


echo json_encode($pending_students_data);
