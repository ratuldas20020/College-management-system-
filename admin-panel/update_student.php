<?php
include "../config.php";
extract($_POST);

if (isset($_POST['regno'])) {
    $message = $_POST['regno'];
    $query = "DELETE FROM students WHERE regno = '$message'
    ";
    $result = mysqli_query($conn, $query);
}
