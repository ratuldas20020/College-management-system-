<?php

include "../config.php";
session_start();
if (isset($_SESSION['username'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM admin WHERE username = '$username' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];
        header('location:index.php');
    } else {
        $error[] = 'incorrect username or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Admin login</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="text" name="username" required placeholder="Enter your username">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">

        </form>

    </div>

</body>

</html>