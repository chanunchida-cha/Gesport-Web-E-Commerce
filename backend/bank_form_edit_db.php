<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('header.php');
error_reporting(0);

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $bid = $_POST["bid"];
  $bname = $_POST["bname"];
  $bnumber = $_POST["bnumber"];
  $bowner = $_POST["bowner"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

  
  $sql = "UPDATE tbl_bank SET  
      bname='$bname' , 
      bnumber='$bnumber' , 
      bowner='$bowner' 
      WHERE bid='$bid' ";

      $result = mysqli_query($conn, $sql);
      mysqli_close($conn); //ปิดการเชื่อมต่อ database 
    


//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('แก้ไขข้อมูลสำเร็จ');";
  echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=bank' ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง');";
  echo "</script>";
}
?>