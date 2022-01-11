<?php
error_reporting(0);
include('conect.php');

$a_user = $_POST['a_user'];
$a_pass = sha1($_POST['a_pass']);
$a_name = $_POST['a_name'];

$check =  "
	SELECT  a_user
	FROM tbl_admin
	WHERE  a_user = '$a_user' 
	";
    $result1 = mysqli_query($conn, $check) ;
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{

$sql ="INSERT INTO tbl_admin
    
    (a_user,  a_pass, a_name) 

    VALUES 

    ('$a_user', '$a_pass', '$a_name')";
    
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ") ;
    mysqli_close($conn);
}

    if($result){
      echo "<script>";
      echo "alert('เพิ่มผู้ดูแลระบบสำเร็จ');";
      echo "window.location ='http://localhost/gesport/bootstrap/index.php?act=admin'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      //echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
      echo "window.location ='http://localhost/gesport/bootstrap/index.php?act=admin'; ";
      echo "</script>";
    }
