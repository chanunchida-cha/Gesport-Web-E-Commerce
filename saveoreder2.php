<?php
session_start();
include("./backend/conect.php");
// error_reporting(error_reporting() & ~E_NOTICE);
if ($_SESSION['username'] == '') {
?>

    <script>
        Swal.fire({
            icon: 'error',
            title: 'มีบางอย่างผิดปกติ!',
            text: 'กรุณา login ก่อนทำการสั่งซื้อ',
            confirmButtonText: 'ตกลง',
            allowEscapeKey: false,
            footer: '<a href="index.php">ย้อนกลับไปหน้าแรก</a>'
        }).then(function() {
            window.location.href = "index.php";
        });
    </script>

<?php }
if ($_SESSION['username'] == '') { // หาก Error ให้ลบอันนี้เป็นอันดับแรก
    unset($_SESSION['cart']); //  หาก Error ให้ลบอันนี้เป็นอันดับแรก
} ?>



<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

// echo '<pre>';
// print_r($_SESSION);

// echo '</pre>';

// echo '<hr>';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

$name = mysqli_real_escape_string($conn, $_POST["m_name"]);
$address = mysqli_real_escape_string($conn, $_POST["m_address"]);
$email = mysqli_real_escape_string($conn, $_POST["m_email"]);
$phone = mysqli_real_escape_string($conn, $_POST["m_tel"]);
$member_id = mysqli_real_escape_string($conn, $_POST["member_id"]);
//
$total = mysqli_real_escape_string($conn, $_POST["total"]); //ราคารวมทั้งตะกร้า
$dttm = Date("Y-m-d G:i:s");
//บันทึกการสั่งซื้อลงใน order_detail
mysqli_query($conn, "BEGIN");
$sql1    = "INSERT INTO order_head 
    VALUES
    (null,
    '$member_id',
    '$dttm',
    '$name', 
    '$address', 
    '$email', 
    '$phone', 
    '$total',
    1,
    0,
    '',
    '0000-00-00',
    0,
    '',
    '0000-00-00'
    )";
$query1    = mysqli_query($conn, $sql1);
// echo $sql1;
//exit;

//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
$sql2 = "SELECT max(o_id) AS o_id 
    FROM order_head 
    WHERE member_id = '$member_id'
    AND o_dttm='$dttm' ";
$query2    = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($query2);
$o_id = $row["o_id"]; //order id ล่าสุดในตาราง order header

// echo '<br>';
// echo $sql2;
// echo '<br>';
// echo $o_id;
// echo '<br>';

//exit;
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
foreach ($_SESSION['cart'] as $p_id => $qty) {
    $sql3    = "SELECT * FROM tbl_product WHERE p_id=$p_id";
    $query3    = mysqli_query($conn, $sql3);
    $row3    = mysqli_fetch_array($query3);
    $pricetotal    = $row3['p_price'] * $qty;
    $count= mysqli_num_rows($query3);

    $sql4    = "INSERT INTO order_detail 
        VALUES
        (null, 
        $o_id, 
        $p_id, 
        $qty, 
        $pricetotal)";
    $query4    = mysqli_query($conn, $sql4);

    // echo '<pre>';
    // echo $sql4;
    // echo '</pre>';

    //ตัดสต๊อก
  for($i=0; $i<$count; $i++){
    $inStock =  $row3['p_stock']; //จำนวนสินค้าที่มีอยู่
    
    $updateStock = $inStock - $qty;
    
    $sql5 = "UPDATE tbl_product SET  
       p_stock=$updateStock
       WHERE  p_id=$p_id ";
    $query5 = mysqli_query($conn, $sql5);  
    }
      
    /*   stock  */

}

// exit;

if ($query1 && $query4) {
    mysqli_query($conn, "COMMIT");
    $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
    foreach ($_SESSION['cart'] as $p_id) {
        //unset($_SESSION['cart'][$p_id]);
        unset($_SESSION['cart']);
    }
} else {
    mysqli_query($conn, "ROLLBACK");
    $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
}
?>
<script type="text/javascript">
    alert("<?php echo $msg; ?>");
    window.location = './member/index.php?act=order_detail&o_id=<?php echo $o_id; ?>&do=save_order';
</script>