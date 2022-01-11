<?php include('header.php');
//query cart detail

//query cart detail

$queryorder = "SELECT  *
FROM order_head
WHERE  o_status = 4
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gesport</title>

</head>



<body>
    <p>

    </p>
    <h5>รายการถูกยกเลิก</h5>

    <p>

    </p>
    <script>
        
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

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
                    <center>date</center>
                </th>
                <th width="15%">
                    <center>total</center>
                </th>
                <th width="5%">
                    <center>ยกเลิก</center>
                </th>
                <th width="10%">
                    <center>view</center>
                </th>

            </tr>
            </tread>
            <tbody>
            <?php foreach ($rsorder as $row) { ?>
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
                    <td><font color='black'><?php echo $row['o_dttm']; ?></font></td>
                    <td align="right"><font color='black'><?php echo number_format($row['o_total'], 2); ?></font></td>
                    <td><font color='black'>
                        ยกเลิก
                        </font>
                    <td><font color='black'>
                        <?php

                        $o_id = $row['o_id']; //parameter
                        echo "<a href='../bootstrap/index.php?act=order_cancel&o_id=$o_id&do=ems_detail' class='btn btn-outline-primary btn-xs'>แสดง</a>";
                        echo '</font>';

                        ?></font>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>


</body>

</html>