<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$member_id = $_POST["member_id"];
$m_user = $_POST["m_user"];

$m_name = $_POST["m_name"];
$m_email = $_POST["m_email"];
$m_tel = $_POST["m_tel"];
$m_address = $_POST["m_address"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE tbl_member SET  
      m_user='$m_user', 
     
      m_name='$m_name',
      m_email='$m_email',
      m_tel='$m_tel', 
      m_address='$m_address' 
      WHERE member_id='$member_id' ";

$result = mysqli_query($conn, $sql)  or die("Error in query: $sql ");

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขข้อมูลสำเร็จ');";
  echo "window.location = '../bootstrap/index.php?act=member'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>