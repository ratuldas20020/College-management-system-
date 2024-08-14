<?php
include "../config.php";
extract($_POST);

if (isset($_POST['regno'])) {
  $regno = $_POST['regno'];
  $query = "UPDATE students SET approved = 1 WHERE regno = '$regno'";
  $result = mysqli_query($conn, $query);
}
