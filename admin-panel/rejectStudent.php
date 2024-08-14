<?php
include "../config.php";
extract($_POST);

if (isset($_POST['regno'])) {
    $regno = $_POST['regno'];
    $query = "DELETE FROM students WHERE regno = '$regno'";
    $result = mysqli_query($conn, $query);
}
