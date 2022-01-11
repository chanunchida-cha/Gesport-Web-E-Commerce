<?php include('./backend/header.php');
//query cart detail

//query cart detail

$queryorder = "SELECT  *
FROM order_head
WHERE  o_status = 3";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />


</head>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "aaSorting": [
                [0, 'desc']
            ],
            //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
        });
    });
</script>

<body style="font-family: 'Kanit', sans-serif;">
    <p>

    </p>
    <h5>รายการแจ้งเลขEMS</h5>
    <p>

    </p>
    <div>
        <!-- <button onclick="#" ><i class="fas fa-money-check-alt"></i></button> -->

    </div>
    <table class="table table-hover" id="example1" align="center">
        <thead class="thead-dark">
            <tr>
                <th width="5%">
                    <center>#</center>
                </th>
                <th width="45%">
                    <center>ชื่อลูกค้า</center>
                </th>
                <th width="20%">
                    <center>วันที่</center>
                </th>
                <th width="15%">
                    <center>ยอดชำระ</center>
                </th>
                <th width="10%">
                    <center>ใบเสร็จ</center>
                </th>
                <th width="10%">
                    <center>แสดง</center>
                </th>

            </tr>
            </tread>
        <tbody>
            <?php foreach ($rsorder as $row) { ?>
                <tr>
                    <td>
                        <font color='black'><?php echo $row['o_id']; ?></font>
                    </td>
                    <td>
                        <font color='black'><?php
                                            echo '<b>';
                                            echo $row['o_name'];
                                            echo '</b><br>';
                                            echo $row['o_addr'];
                                            echo '<br>';
                                            echo 'เบอร์ติดต่อ: ' . $row['o_phone']   . '  email: ' . $row['o_email'];

                                            ?></font>
                    </td>
                    <td>
                        <font color='black'><?php echo $row['o_dttm']; ?></font>
                    </td>
                    <td align="right">
                        <font color='black'><?php echo number_format($row['o_total'], 2); ?></font>
                    </td>
                    <td>
                        <font color='black'>
                            <a href="../imgslip/<?php echo $row['o_slip']; ?>" target="_blank">
                                <img src="../imgslip/<?php echo $row['o_slip']; ?>" width="100%">
                        </font>
                    </td>
                    </a>
                    <td>
                        </font>
                        <?php

                        $o_id = $row['o_id']; //parameter
                        echo "<a href='../bootstrap/index.php?act=ems_detail&o_id=$o_id&do=ems_detail' class='btn btn-outline-primary btn-xs'>แสดง</a>";
                        echo '</font>';

                        ?></font>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>


</body>

</html>