<?php include('header.php');
//query cart detail

//query cart detail

$queryorder = "SELECT  *
FROM order_head
WHERE  member_id= $member_id  
AND o_status = 4
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
    <h4>รายการที่ถูกยกเลิก</h4>
    <div>
        <!-- <button onclick="#" ><i class="fas fa-money-check-alt"></i></button> -->

    </div>
    <script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

    <table class="table table-hover"id="example1" align="center">
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

                            <?php

                            //parameter
                            echo "<a href='index.php?act=cancel&o_id=$o_id&do=cancel' class='btn btn-primary btn-xs'>แสดง</a>";
                            echo '</font>';

                            ?></font>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>


</body>

</html>