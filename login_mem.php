<?php

session_start();

include('./backend/conect.php');


$errors = array();
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (count($errors) == 0) {
    $password = sha1($password);
    $query = "SELECT * FROM tbl_member WHERE m_user ='$username' AND m_pass='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) == 1) {
        echo $_SESSION['username'] = $username;
        $_SESSION['member_id'] = $row["member_id"];
        $_SESSION['m_name'] = $row["m_name"];
        $_SESSION['m_email'] = $row["m_email"];
        $_SESSION['m_tel'] = $row["m_tel"];
        $_SESSION['m_address'] = $row["m_address"];

        echo "success";
        header('Location: index.php');
    } else {
        echo "user หรือ  password ไม่ถูกต้อง";
    }
}
?>
