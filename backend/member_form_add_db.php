<?php
include('./conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$m_user = mysqli_real_escape_string($conn,$_POST["m_user"]);
$m_pass = mysqli_real_escape_string($conn,$_POST["m_pass"]);
$m_name = mysqli_real_escape_string($conn,$_POST["m_name"]);
$m_email = mysqli_real_escape_string($conn,$_POST["m_email"]);
$m_tel = mysqli_real_escape_string($conn,$_POST["m_tel"]);
$m_address = mysqli_real_escape_string($conn,$_POST["m_address"]);
$m_pass = sha1($m_pass);

  $check =  "
	SELECT  m_user,m_email
	FROM tbl_member
	WHERE  m_user = '$m_user'  
  OR m_email = '$m_email'
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
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO tbl_member(m_user, m_pass, m_name, m_email, m_tel, m_address)
       VALUES('$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel', '$m_address')";

  $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ") ;
  
  //ปิดการเชื่อมต่อ database
  mysqli_close($conn);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
    }
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('เพิ่มสมาชิกสำเร็จ');";
  echo "window.location = '../bootstrap/index.php?act=member'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  //echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>