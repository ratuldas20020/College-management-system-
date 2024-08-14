<?php
include "../config.php";

$query = "SELECT * FROM posts";
$result = $conn->query($query);


$posts = array();
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

echo json_encode($posts);
