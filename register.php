<?php

session_start();

include('./backend/conect.php');

$errors = array();
$name = mysqli_real_escape_string($conn, $_POST['name']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
//echo "$name $username $password $phone $address";
$password = sha1($password);
$check =  " SELECT  m_user , m_email
	FROM tbl_member
	WHERE  m_user = '$username' OR m_email = '$email'
	";
$result1 = mysqli_query($conn, $check);
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "username หรือ email นี้ถูกใช้งานแล้ว";
} else {
    $sql = "INSERT INTO tbl_member(m_user, m_pass,m_name,m_email,m_tel, m_address) VALUES('$username', '$password', '$name', '$email' ,'$phone', '$address')";
    $result = mysqli_query($conn, $sql) or die("Error in query: $sql ");
    echo "success";
header('Location: http://localhost/gesport/index.php');
}

