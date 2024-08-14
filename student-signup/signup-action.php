<?php
include '../config.php';

$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$gurdian = $_POST['gurdian'];
$password = md5($_POST['password']);
$conpassword = md5($_POST['conpassword']);
$address = $_POST['address'];
$regno = $_POST['regno'];
$rollno = $_POST['rollno'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$issueddate = $_POST['issueddate'];


$sessionid = md5($fullname . $password);


$select = " SELECT * FROM students WHERE regno = '$regno' ";

$result = mysqli_query($conn, $select);

if (
	$fullname == "" ||
	$dob == "" ||
	$email == "" ||
	$mobile == "" ||
	$gender == "" ||
	$gurdian == "" ||
	$password == "" ||
	$conpassword == "" ||
	$address == "" ||
	$regno == "" ||
	$rollno == "" ||
	$college == "" ||
	$branch == "" ||
	$issueddate == ""

) {
	echo "Please Fill all fields";
} else if ($password != $conpassword) {
	echo "Password not same";
} else if (mysqli_num_rows($result) > 0) {
	echo "user already requested/exists";
} else {
	$insert = "INSERT INTO students(fullname,regno,dob,mobile,email,gender,gurdian,roll,college, branch,password,address,issueddate,sessionid)
		VALUES('$fullname','$regno','$dob','$mobile','$email','$gender','$gurdian','$rollno','$college','$branch','$password','$address','$issueddate','$sessionid')";

	mysqli_query($conn, $insert);

	echo "Registration successfully...";
}
