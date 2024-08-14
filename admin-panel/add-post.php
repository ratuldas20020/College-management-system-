<?php
include "../config.php";
extract($_POST);

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $query = "INSERT INTO `posts` (`message`) VALUES ('$message')";
    $result = mysqli_query($conn, $query);
}
