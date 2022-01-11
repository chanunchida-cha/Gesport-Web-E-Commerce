<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$bid = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา

$sql = "DELETE FROM tbl_bank WHERE bid='$bid' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=bank'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
}
?>