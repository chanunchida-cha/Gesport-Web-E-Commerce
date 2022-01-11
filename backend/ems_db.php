<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('./conect.php'); ?>
<?php
// Array ( [o_ems] => th3343222 [order_id] => 15 )
$o_ems = mysqli_real_escape_string($conn, $_POST['o_ems']);
$o_id = mysqli_real_escape_string($conn, $_POST['o_id']);
$o_ems_date = date('Y-m-d H:i:s');

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE order_head SET  
o_ems='$o_ems',
o_ems_date='$o_ems_date',
o_status=3
WHERE o_id='$o_id' ";

$result = mysqli_query($conn, $sql);

// echo $sql;
// exit;
mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกข้อมูลสำเเร็จ');";
    echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=paid'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=paid'; ";
    echo "</script>";
}

?>