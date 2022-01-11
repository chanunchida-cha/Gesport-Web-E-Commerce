<meta charset="UTF-8">
<?php
error_reporting(0);
//1. เชื่อมต่อ database: 
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$type_id = $_REQUEST["type_id"];
$type_name = $_REQUEST["type_name"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

  $sql = "UPDATE tbl_type SET  
      type_name='$type_name' 
      WHERE type_id='$type_id' ";

$result = mysqli_query($conn, $sql);
mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขสำเร็จ');";
  echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=type_product'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>