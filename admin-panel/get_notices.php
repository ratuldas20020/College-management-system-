<?php
include "../config.php";

$query = "SELECT * FROM notice";
$result = $conn->query($query);


$notices = array();
while ($row = $result->fetch_assoc()) {
    $notices[] = $row;
}



echo json_encode($notices);
