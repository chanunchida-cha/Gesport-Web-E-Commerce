<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('./conect.php');

// print_r($_POST);
// echo '<hr>';
// exit;


?>

<?php

$o_id = mysqli_real_escape_string($conn, $_POST['o_id']);


//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE order_head SET  
o_status=4
WHERE o_id='$o_id' ";

$result = mysqli_query($conn, $sql);

// echo $sql;
// exit;
mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('ยกเลิกคำสั่งซื้อสำเร็จ');";
    echo "window.location = 'http://localhost/gesport/bootstrap/index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ยกเลิกคำสั่งซื้อไม่สำเร็จ กรุณาลองใหม่');";
    echo "window.location = 'http://localhost/gesport/bootstrap/index.php'; ";
    echo "</script>";
}

?>