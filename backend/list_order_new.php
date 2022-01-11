<?php //include('header.php');
//query cart detail

//query cart detail

$queryorder = "SELECT  *
FROM order_head
WHERE  o_status = 1
ORDER BY o_id DESC";
$rsorder = mysqli_query($conn, $queryorder);

$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;

// echo '<pre>';
// print_r( $rowdetail);
// echo '</pre>';
//echo round(abs(strtotime("2020-02-1") - strtotime("2020-02-8"))/60/60/24);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Gesport</title>
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


<body>
    <p>

    </p>
    <h4>รายการที่ต้องชำระ</h4>
    <div>
        <!-- <button onclick="#" ><i class="fas fa-money-check-alt"></i></button> -->

    </div>


    <table class="table table-hover" id="example1" align="center">

        <thead class="thead-dark">
        <tr>
                <th width="5%">
                    <center>#</center>
                </th>
                <th width="40%">
                    <center>ชื่อลูกค้า</center>
                </th>
                <th width="15%">
                    <center>วันที่สั่งซื้อ</center>
                </th>
                <th width="15%">
                    <center>ยอดสั่งซื้อ</center>
                </th>
                <th width="10%">
                    <center>จำนวนวัน</center>
                </th>
                <th width="5%">
                    <center>view</center>
                </th>


            </tr>
            </tread>
            <tbody>
            <?php foreach ($rsorder as $row) { 
                $o_id = $row['o_id'];
                ?>
               
                <tr>
                    <td><font color='black'><?php echo $row['o_id']; ?></font></td>
                    <td><font color='black'><?php
                        echo '<b>';
                        echo $row['o_name'];
                        echo '</b><br>';
                        echo $row['o_addr'];
                        echo '<br>';
                        echo 'เบอร์ติดต่อ: ' . $row['o_phone']   . '  email: ' . $row['o_email'];

                        ?></font></td>
                    <td><font color='black'> <?php echo $row['o_dttm']; ?></font></td>
                    <td align="right"><font color='black'><?php echo number_format($row['o_total'], 2); ?></font></td>
                    <td align="center"><font color='black'>
                        <?php
                        $o_dttm = date('Y-m-d', strtotime($row['o_dttm'])); //วันทที่สั่งซื้อ
                        $datenow = date('Y-m-d'); //วันปัจจุบัน
                        // echo 'วันที่สั้ง'. $o_dttm;
                        // echo 'วันปจบ'. $datenow;
                        
                        $caldate = round(abs(strtotime("$o_dttm") - strtotime("$datenow")) / 60 / 60 / 24);
                        if ($caldate > 7) {
                            echo $caldate . 'วัน';
                            echo "<a href='../bootstrap/index.php?act=order_cancel&o_id=$o_id&do=order_cancel' class='btn btn-danger btn-sm' >ยกเลิกคำสั่งซื้อ</a>";
                        } else {
                            echo $caldate . 'วัน';
                        }

                        ?></font>
                    </td>
                    <td><font color='black'>

                        <?php

                         //parameter
                        echo "<a href='../bootstrap/index.php?act=order_detail&o_id=$o_id&do=order_detail' class='btn btn-outline-primary btn-sm' >แสดง</a>";
                        echo '</font>';

                        ?></font>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>




</body>

</html>