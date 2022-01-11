<?php include('./header.php');
//query cart detail

//query cart detail

$queryorder = "SELECT  *
FROM order_head
WHERE  member_id= $member_id  ";
//AND o_status = 3
$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;

// echo '<pre>';
// print_r( $rowdetail);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>

<body>
    <h4>ประวัติการสั่งซื้อ</h4>
    <div>
        <!-- <button onclick="#" ><i class="fas fa-money-check-alt"></i></button> -->

    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th width="5%">
                    <center>#</center>
                </th>
                <th width="10%">
                    <center>สถานะ</center>
                </th>
                <th width="10%">
                    <center>date</center>
                </th>
                <th width="10%">
                    <center>total</center>
                </th>
                <th width="5%">
                    <center>slip</center>
                </th>
                <th width="10%">
                    <center>ems</center>
                </th>
                <th width="5%">
                    <center>view</center>
                </th>

            </tr>
            </tread>
        <tbody>
            <?php foreach ($rsorder as $row) { ?>
                <tr>
                    <td><?php echo $row['o_id']; ?></td>
                    <td><?php

                        $st = $row['o_status'];

                        if ($st == 1) {
                            echo "<font color='#FF8B1F'>";
                            echo 'รอชำระเงิน';
                            echo "</font>";
                        } elseif ($st == 2) {
                            echo "<font color='#31A3FF'>";
                            echo 'ชำระเงินแล้ว';
                            echo "</font>";
                        } elseif ($st == 3) {
                            echo "<font color='green'>";
                            echo 'ตรวจสอบเลขems';
                            echo "</font>";
                        } else {
                            echo "<font color='red'>";
                            echo 'ยกเลิก';
                            echo "</font>";
                        }
                        echo '</font>';

                        //1=รอชำระเงิน 2=ชำระเงินแล้ว 3=ตรวจสอบเลขems 4=ยกเลิก	





                        ?></td>
                    <td><?php echo $row['o_dttm']; ?></td>
                    <td align="right"><?php echo number_format($row['o_total'], 2); ?></td>
                    <td>slip</td>
                    <td><?php echo $row['o_ems']; ?></td>
                    <td>
                        <?php

                        $o_id = $row['o_id']; //parameter
                        if ($st == 1) {
                            echo "<a href='index.php?act=payment&o_id=$o_id' class='btn btn-primary btn-xs'>ชำระเงิน</a>";
                        } elseif ($st == 2) {
                            echo "<a href='index.php?payment_detail&o_id=$o_id&act=ems' class='btn btn-info btn-xs'>แสดง</a>";
                        } elseif ($st == 3) {
                            echo "<a href='index.php?payment_detail&o_id=$o_id&act=ems' class='btn btn-success btn-xs'>ตรวจสอบเลขems</a>";
                        } else {
                            echo "<a href='index.php?act=cancel&o_id=$o_id&do=cancel' class='btn btn-danger btn-xs'>แสดง</a>";
                        }
                        echo '</font>';

                        //1=รอชำระเงิน 2=ชำระเงินแล้ว 3=ตรวจสอบเลขems 4=ยกเลิก
                        ?>



                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>


</body>

</html>