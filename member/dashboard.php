<?php
//query status = 1
$querystatus1 = "SELECT o_status, COUNT(o_id)  as s1total
FROM order_head
WHERE member_id= $member_id  
AND  o_status = 1
GROUP BY o_status; ";
$rs1 = mysqli_query($conn, $querystatus1);
$rows1 = mysqli_fetch_array($rs1);

//query status =2
$querystatus2 = "SELECT o_status, COUNT(o_id) as s2total
FROM order_head
WHERE member_id= $member_id  
AND  o_status = 2
GROUP BY o_status; ";
$rs2 = mysqli_query($conn, $querystatus2);
$rows2 = mysqli_fetch_array($rs2);


//query status = 3
$querystatus3 = "SELECT o_status, COUNT(o_id) as s3total
FROM order_head
WHERE member_id= $member_id  
AND  o_status = 3
GROUP BY o_status; ";
$rs3 = mysqli_query($conn, $querystatus3);
$rows3 = mysqli_fetch_array($rs3);


//query status = 4
$querystatus4 = "SELECT o_status, COUNT(o_id) as s4total
FROM order_head
WHERE member_id= $member_id  
AND  o_status = 4
GROUP BY o_status; ";
$rs4 = mysqli_query($conn, $querystatus4);
$rows4 = mysqli_fetch_array($rs4);



// echo $querystatus1;

?>



<body style="font-family: 'Kanit', sans-serif;">

    <?php include('../backend/header.php'); ?>
    <div class="col-md-10" style="margin-top: 100px;
            margin-left: 30px;">
        <a href="../member/index.php" class="btn btn-warning btn-sm" style="color:#fff;"><i class="fas fa-credit-card"></i><br>ที่ต้องชำระ<span class="badge badge-light"><?php echo $rows1['s1total']; ?></span></a>
        <a href="../member/index.php?act=paid" class="btn btn-success btn-sm"><i class="fas fa-box-open"></i><br>ที่ต้องจัดส่ง <span class="badge badge-light"><?php echo $rows2['s2total']; ?></span></a>
        <a href="../member/index.php?act=ship" class="btn btn-info btn-sm"><i class="fas fa-shipping-fast"></i><br>ที่ต้องได้รับ <span class="badge badge-light"><?php echo $rows3['s3total']; ?></span></a>
        <a href="../member/index.php?act=cancel_mem" class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i><br>รายการที่ถูกยกเลิก <span class="badge badge-light"><?php echo $rows4['s4total']; ?></span></a>
        <?php
        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        //ชำระเงิน
        if ($act == 'paid') {
            include '../member/list_order_paid_mem.php';
        } elseif ($act == 'ship') {
            include '../member/list_order_ems_mem.php';
        } elseif ($act == 'cancel_mem') {
            include '../member/list_order_cancel_mem.php';
        } else {
            include '../member/list_order_new_mem.php';
        }  ?>
    </div>
</body>