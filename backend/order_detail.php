<?php
include('header.php');
// print_r($_SESSION);

//query cart detail
$o_id = mysqli_real_escape_string($conn, $_GET['o_id']);
$quertcartdetail = "SELECT  d.* , p.p_img , p.p_name , p.p_price,h.*
FROM order_detail as d
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_product as p ON d.p_id = p.p_id
WHERE d.o_id=$o_id  ";
$rscartdetail = mysqli_query($conn, $quertcartdetail);
$rowdetail = mysqli_fetch_array($rscartdetail);
$querybank = "SELECT  * FROM tbl_bank";
$rsbank = mysqli_query($conn, $querybank);
// echo '<pre>';
// print_r( $rowdetail);
// echo '</pre>';



?>

<body style="font-family: 'Kanit', sans-serif;">
    <h6>รายละเอียดคำสั่งซื้อ</h6>
    <table class="table table-bordered table-hover table-striped">
        <?php echo '<font color="black">'; ?>
        <h6>OrderID: <?php echo $rowdetail['o_id'] ?><br>
            ส่งไปที่: คุณ <?php echo $rowdetail['o_name'] ?> <br>
            ที่อยู่: <?php echo $rowdetail['o_addr'] ?> <br>
            เบอร์โทร: <?php echo $rowdetail['o_phone'] ?> Email: <?php echo $rowdetail['o_email'] ?> <br>
            วันที่สั่งซื้อ: <?php echo $rowdetail['o_dttm'] ?><br>
            สถานะ: <?php
                    $st = $rowdetail['o_status'];

                    if ($st == 1) {
                        echo 'รอชำระเงิน';
                    } elseif ($st == 2) {
                        echo 'ชำระเงินแล้ว';
                    } elseif ($st == 3) {
                        echo 'ตรวจสอบเลขems';
                    } else {
                        echo 'ยกเลิก';
                    }


                    //1=รอชำระเงิน 2=ชำระเงินแล้ว 3=ตรวจสอบเลขems 4=ยกเลิก	
                    ?>


        </h6>

        <tr>
            <th width="5%" bgcolor="#212529" ><font color='#fff'> # </font></font></th>
            <th width="10%" bgcolor="#212529"><font color='#fff'>รูปสินค้า</font></th>
            <th width="55%" bgcolor="#212529"><font color='#fff'>สินค้า</font></th>
            <th width="10%" align="center" bgcolor="#212529"><font color='#fff'>ราคา</font></th>
            <th width="10%" align="center" bgcolor="#212529"><font color='#fff'>จำนวน</font></th>
            <th width="5%" align="center" bgcolor="#212529"><font color='#fff'>รวม(บาท)</font></th>

        </tr>
        <?php
        $total = 0;


        include("conect.php");
        foreach ($rscartdetail as $row) {
            $total += $row["d_subtotal"]; //ราคารวมทั้ง order

            echo "<tr>";
            echo "<td bgcolor='#fff'>" . @$i += 1 . "</td>";
            echo "<td bgcolor='#fff'>"."<font color='black'>" . "<img src ='../backend/p_img/" . $row['p_img'] . "'width='50'>" ."</font>". "</td>";
            echo "<td  bgcolor='#fff'>"."<font color='black'>" . $row["p_name"] . "</font>"."</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["p_price"], 2)."</font>". "</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["d_qty"], 2)."</font>" . "</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["d_subtotal"])."</font>". "</td>";
            echo "</tr>";
        } //close foreach
        echo "<tr>";
        echo "<td colspan='5' bgcolor='#fff' align='center'><b>ราคารวม</b></td>";
        echo "<td align='right' bgcolor='#fff'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

        echo "</tr>";
        ?>
    </table>
    <?php if ($_GET['do'] == 'order_cancel') { ?>
        <form action="../backend/order_cancel.php" method="post">
            <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการยกเลิกคำสั่งซื้อ')">ยืนยันการยกเลิกคำสั่งซื้อ</button>
        </form>
    <?php } ?>
    <?php echo '</font>'; ?>



</body>