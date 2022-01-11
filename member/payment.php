<?php
include('./header.php');
// print_r($_SESSION);

//query cart detail
$o_id = mysqli_real_escape_string($conn, $_GET['o_id']);
$quertcartdetail = "SELECT  d.* , p.p_img , p.p_name , p.p_price,h.*
FROM order_detail as d
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_product as p ON d.p_id = p.p_id
WHERE d.o_id=$o_id
AND h.member_id = $member_id";
$rscartdetail = mysqli_query($conn, $quertcartdetail);
$rowdetail = mysqli_fetch_array($rscartdetail);
// echo '<pre>';
// print_r( $rowdetail);
// echo '</pre>';
$querybank = "SELECT  * FROM tbl_bank";
$rsbank = mysqli_query($conn, $querybank);


?>

<body style="font-family: 'Kanit', sans-serif;">
    <h6>แจ้งชำระเงิน</h6>
    <table class="table table-bordered">
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
                    echo '</font>';

                    //1=รอชำระเงิน 2=ชำระเงินแล้ว 3=ตรวจสอบเลขems 4=ยกเลิก	
                    ?>


        </h6>

        <tr>
            <th width="5%" bgcolor="#212529">
                <font color='#fff'>#</font>
            </th>
            <th width="10%" bgcolor="#212529">
                <font color='#fff'>รูปสินค้า
            </th>
            <th width="55%" bgcolor="#212529">
                <font color='#fff'>สินค้า
            </th>
            <th width="10%" align="center" bgcolor="#212529">
                <font color='#fff'>ราคา</font>
            </th>
            <th width="10%" align="center" bgcolor="#212529">
                <font color='#fff'>จำนวน</font>
            </th>
            <th width="5%" align="center" bgcolor="#212529">
                <font color='#fff'>รวม(บาท)</font>
            </th>

        </tr>
        <?php
        $total = 0;


        include("./backend/conect.php");
        foreach ($rscartdetail as $row) {
            $total += $row["d_subtotal"]; //ราคารวมทั้ง order

            echo "<tr>";
            echo "<td bgcolor='#fff'>" . "<font color='black'>" . @$i += 1 . "</font>" . "</td>";
            echo "<td bgcolor='#fff'>" . "<font color='black'>" . "<img src ='../backend/p_img/" . $row['p_img'] . "'width='50'>" . "</font>" . "</td>";
            echo "<td  bgcolor='#fff'>" . "<font color='black'>" . $row["p_name"] . "</td>";
            echo "<td  align='right' bgcolor='#fff'>" . "<font color='black'>" . number_format($row["p_price"], 2) . "</font>" . "</td>";
            echo "<td  align='right' bgcolor='#fff'>" . "<font color='black'>" . number_format($row["d_qty"], 2) . "</font>" . "</td>";
            echo "<td  align='right' bgcolor='#fff'>" . "<font color='black'>" . number_format($row["d_subtotal"]) . "</font>" . "</td>";
            echo "</tr>";
        } //close foreach
        echo "<tr>";
        echo "<td colspan='5' bgcolor='#fff' align='center'>" . "<font color='black'>" . "<b>" . "ราคารวม" . "</b>" . "</font>" . "</td>";
        echo "<td align='right' bgcolor='#fff'>" . "<font color='black'>" . "<b>" . number_format($total, 2) . "</font>" . "</b>" . "</td>";

        echo "</tr>";
        ?>
    </table>

    <h6>เลือกธนาคารที่ต้องการชำระเงิน</h6>
    <form action="./payment_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <table class="table table-bordered table-hover table-striped">
            <tread>
                <tr>
                    <th width="15%" bgcolor="#212529">
                        <font color='#fff'>
                            <center>เลือกธนาคาร</center>
                        </font>
                    </th>
                    <th width="20%" bgcolor="#212529">
                        <font color='#fff'>
                            <center bgcolor="#212529">ธนารคาร</center>
                        </font>
                    </th>
                    <th width="30%" bgcolor="#212529">
                        <font color='#fff'>
                            <center>เลขบัญชี</center>
                        </font>
                    </th>
                    <th width="35%" bgcolor="#212529">
                        <font color='#fff'>
                            <center>ชื่อบัญชี</center>
                        </font>
                    </th>


                </tr>
                <?php foreach ($rsbank as $rsb) {
                    $bid = $rsb["bid"];
                    echo '<tr>';
                    echo "<td align='center' bgcolor='F7F9F9'>"  . "<font color='black'>" . "<input type='radio' name='bid' value='$bid' required>" . "</font>"  . "</td>";
                    echo "<td align='left' bgcolor='F7F9F9'>"  . "<font color='black'>" . $rsb["bname"] . "</font>"  . "</td>";
                    echo "<td align='left' bgcolor='F7F9F9'>"  . "<font color='black'>" . $rsb["bnumber"] . "</font>" . "</td>";
                    echo "<td align='left' bgcolor='F7F9F9'>" . "<font color='black'>"  . $rsb["bowner"] . "</font>" . "</td>";

                    echo '</tr>';
                } ?>
            </tread>
        </table>

        <div class="form-group">
            <div class="col-md-4">วันที่ชำระ <br>
                <input type="date" name="o_slip_date" class="form-control" required><br>
            </div>
            <div class="col-md-3">ยอดชำระ
                <br>
                <input type="number" name="o_slip_total" any required min="0" class="form-control" value="<?php echo $total; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">อัพโหลดภาพสลิป <br>
                <input type="file" name="o_slip" required class="form-control" accept="image/*">

            </div>
            <div class="col-md-2"><br>
                <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
                <button type="submit" class="btn btn-primary">แจ้งชำระเงิน </button>

            </div>

        </div>


    </form>
</body>