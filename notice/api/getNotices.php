<?php
include "../../config.php";



$query = "SELECT * FROM notice";
$result = $conn->query($query);

// all colleges stored in an json array
$colleges = array();
while ($row = $result->fetch_assoc()) {
    $colleges[] = $row;
}

echo json_encode($colleges);
