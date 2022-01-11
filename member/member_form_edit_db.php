<meta charset="UTF-8">
<?php
error_reporting(0);
//1. เชื่อมต่อ database: 
include('../backend/conect.php');
//ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$m_user = mysqli_real_escape_string($conn, $_POST["m_user"]);
$m_pass = mysqli_real_escape_string($conn, $_POST["m_pass"]);
$m_name = mysqli_real_escape_string($conn, $_POST["m_name"]);
$m_email = mysqli_real_escape_string($conn, $_POST["m_email"]);
$m_tel = mysqli_real_escape_string($conn, $_POST["m_tel"]);
$m_address = mysqli_real_escape_string($conn, $_POST["m_address"]);
$m_pass = sha1($m_pass);
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE tbl_member SET  
  
      m_name='$m_name',
      m_email='$m_email',
      m_tel='$m_tel', 
      m_address='$m_address' 
      WHERE m_user LIKE '$m_user' ";

$result = mysqli_query($conn, $sql);

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขสำเร็จ');";
  echo "window.location = 'http://localhost/gesport/member/index.php?act=edit'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>