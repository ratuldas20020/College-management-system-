<?php
include "../config.php";
$totalItems = array();
$select = " SELECT * FROM students WHERE approved = 1";
$students_result = mysqli_query($conn, $select);
//total_students
$totalItems["students"] =  $students_result->num_rows;
$select = " SELECT * FROM students WHERE approved = 0";
$pending_students_result = mysqli_query($conn, $select);
$totalItems["pending"] = $pending_students_result->num_rows;
$select = "SELECT * FROM posts";
$post_result = mysqli_query($conn, $select);
//total_post
$totalItems["posts"] = $post_result->num_rows;
$select = "SELECT * FROM notice";
$notice_result = mysqli_query($conn, $select);
$totalItems["notices"] = $notice_result->num_rows;
echo json_encode($totalItems);
