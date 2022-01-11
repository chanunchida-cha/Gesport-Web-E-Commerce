<?php
//query status = 1
$querystatus1 = "SELECT o_status, COUNT(o_id) as s1total
FROM order_head
WHERE o_status = 1
GROUP BY o_status; ";
$rs1 = mysqli_query($conn, $querystatus1);
$rows1 = mysqli_fetch_array($rs1);

//query status =2
$querystatus2 = "SELECT o_status, COUNT(o_id) as s2total
FROM order_head
WHERE o_status = 2
GROUP BY o_status; ";
$rs2 = mysqli_query($conn, $querystatus2);
$rows2 = mysqli_fetch_array($rs2);


//query status = 3
$querystatus3 = "SELECT o_status, COUNT(o_id) as s3total
FROM order_head
WHERE o_status = 3
GROUP BY o_status; ";
$rs3 = mysqli_query($conn, $querystatus3);
$rows3 = mysqli_fetch_array($rs3);


//query status = 4
$querystatus4 = "SELECT o_status, COUNT(o_id) as s4total
FROM order_head
WHERE o_status = 4
GROUP BY o_status; ";
$rs4 = mysqli_query($conn, $querystatus4);
$rows4 = mysqli_fetch_array($rs4);



// echo $querystatus1;

?>
<style type="text/css"> 
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
</style> 



<body style="font-family: 'Kanit', sans-serif;">

    <?php include('../backend/header.php');
    ?>
    <div class="col-md-10" style="margin-top: 100px;
            margin-left: 30px;">
        <a href="../bootstrap/index.php" id="non-printable" class="btn btn-warning btn-sm">รอชำระเงิน <span class="badge badge-light"><?php echo $rows1['s1total']; ?></span></a>
        <a href="../bootstrap/index.php?act=paid" id="non-printable" class="btn btn-success btn-sm">ชำระเงินแล้ว <span class="badge badge-light"><?php echo $rows2['s2total']; ?></span></a>
        <a href="../bootstrap/index.php?act=ems" id="non-printable" class="btn btn-info btn-sm">จัดส่งเรียบร้อย <span class="badge badge-light"><?php echo $rows3['s3total']; ?></span></a>
        <a href="../bootstrap/index.php?act=cancel" id="non-printable" class="btn btn-danger btn-sm">รายการที่ยกเลิก <span class="badge badge-light"><?php echo $rows4['s4total']; ?></span></a>
        <?php
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        //ชำระเงิน
        if ($act == 'paid') {
            include '../backend/list_order_paid.php';
        } elseif ($act == 'ems') {
            include '../backend/list_order_ems.php';
        } elseif ($act == 'cancel') {
            include '../backend/list_order_cancel.php';
        } else {
            include '../backend/list_order_new.php';
        }  ?>
    </div>
    
    <p>

    </p>
    <p>

    </p>
    
</body>