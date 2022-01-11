<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../backend/conect.php');

error_reporting(0); //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$m_user = ($_REQUEST["m_user"]);
$m_pass1 = ($_REQUEST["m_pass1"]);
$m_pass1 = sha1($m_pass1);
$m_pass2 = ($_REQUEST["m_pass2"]);
$m_pass2 = sha1($m_pass2);
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
if($m_pass1 != $m_pass2){
  echo "<script type='text/javascript'>";
  echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
  echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=member'; ";
  echo "</script>";
}else{
  
  $sql = "UPDATE tbl_member SET  
      m_pass='$m_pass1'
      WHERE m_user LIKE '$m_user' ";

$result = mysqli_query($conn, $sql);

mysqli_close($conn); //ปิดการเชื่อมต่อ database 
}

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขรหัสผ่านสำเร็จ');";
  echo "window.location = 'http://localhost/gesport/member/index.php?act=edit_password'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>