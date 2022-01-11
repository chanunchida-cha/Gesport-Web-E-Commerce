<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script></head>
<?php 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// echo $_FILES['o_slip']['name'];
// Array
// (
//     [bid] => 2
//     [o_slip_date] => 2021-09-18
//     [o_slip_total] => 119800
//     [o_id] => 4
//o_slip
// )
include('../backend/conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $bid = mysqli_real_escape_string($conn,$_POST["bid"]);
  $o_slip_date = mysqli_real_escape_string($conn,$_POST["o_slip_date"]);
  $o_slip_total = mysqli_real_escape_string($conn,$_POST["o_slip_total"]);
  $o_id = mysqli_real_escape_string($conn,$_POST["o_id"]);

$date1=date("Ymd_his");//สุ่มชื่อไฟล์ ว/
$numrand=(mt_rand());

$o_slip = (isset($_POST['o_slip']) ?$_POST['o_slip'] : '');
$upload=$_FILES['o_slip']['name'];
if($upload !=''){
    $path= "../imgslip/";
    $type = strrchr($_FILES['o_slip']['name'],".");
    $newname='slip'.$numrand.$date1.$type;
    $path_copy=$path.$newname;
    $path_link="../imgslip/".$newname;
    move_uploaded_file($_FILES['o_slip']['tmp_name'],$path_copy);

} else{
    $newname='';
}

$sql="UPDATE order_head SET
bid='$bid',
o_slip_date='$o_slip_date',
o_slip_total='$o_slip_total',
o_status=2,
o_slip='$newname'
WHERE o_id=$o_id";

$result = mysqli_query($conn,$sql) ;

mysqli_close($conn); 

// echo '<pre>';
// print_r($sql);
// echo '</pre>';


if($result){
    echo "<script type='text/javascript'>";
    echo "alert('แจ้งชำระเงินสำเร็จ');";
    echo "window.location ='./index.php?payment_detail&o_id=$o_id&act=ems';";
    echo "</script>";
} 
else {
    echo "<script type='text/javascript'>";
    echo "alert('แจ้งชำระเงินไม่สำเร็จ');";
    echo "window.location ='./index.php';";
    echo "</script>";
}

?>



