<?php
include('header.php');
// print_r($_SESSION);

//query cart detail
$o_id = mysqli_real_escape_string($conn, $_GET['o_id']);
$quertcartdetail = "SELECT  d.* , p.p_img , p.p_name , p.p_price,h.*,b.bname,b.bnumber
FROM order_detail as d
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_product as p ON d.p_id = p.p_id
INNER JOIN tbl_bank as b ON h.bid = b.bid
WHERE d.o_id=$o_id";
$rscartdetail = mysqli_query($conn, $quertcartdetail);
$rowdetail = mysqli_fetch_array($rscartdetail);
// echo '<pre>';
// print_r( $rowdetail);
// echo '</pre>';
$querybank = "SELECT  * FROM tbl_bank";
$rsbank = mysqli_query($conn, $querybank);


?>


<body style="font-family: 'Kanit', sans-serif;">
    <h5>รายละเอียดการแจ้งเลขEMS</h5>
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
            echo "<td bgcolor='#fff'>"."<font color='black'>" . @$i += 1 ."</font>" . "</td>";
            echo "<td bgcolor='#fff'>"."<font color='black'>" . "<img src ='../backend/p_img/" . $row['p_img'] . "'width='50'>" ."</font>". "</td>";
            echo "<td  bgcolor='#fff'>"."<font color='black'>" . $row["p_name"] . "</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["p_price"], 2) ."</font>" . "</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["d_qty"], 2) ."</font>" . "</td>";
            echo "<td  align='right' bgcolor='#fff'>"."<font color='black'>" . number_format($row["d_subtotal"]) ."</font>" . "</td>";
            echo "</tr>";
        } //close foreach
        echo "<tr>";
        echo "<td colspan='5' bgcolor='#fff' align='center'>"."<b>."."<font color='black'>" . "ราคารวม" ."</font>" ."</b></td>";
        echo "<td align='right' bgcolor='#fff'>"."<font color='black'>" . "<b>" . number_format($total, 2) . "</b>"."</font>" . "</td>";

        echo "</tr>";
        ?>
    </table>

    <h5>แสดงรายละเอียดการชำระเงิน</h5>
    <div class="col-sm-6">
        ธนาคารที่ชำระเงิน: <?php echo $rowdetail['bname'];    ?> <br>
        เลขบัญชี: <?php echo $rowdetail['bnumber']; ?><br>
        จำนวนเงิน: <?php echo $rowdetail['o_slip_total']; ?><br>
        ว/ด/ปี: <?php echo $rowdetail['o_slip_date']; ?> <br>
        หลักฐานการชำระเงิน: <br> <img src="../imgslip/<?php echo $rowdetail['o_slip']; ?>" width="60%">
    </div>
    <br>
    <div class="col-sm-6">
        <h6>เลขEMS:    <?php echo $rowdetail['o_ems']; ?></h6> <br>
        <h6>วัน/เดือน/ปี:    <?php echo date('d/m/Y H:i:s',strtotime($rowdetail['o_ems_date'])); ?></h6>
    </div>
    <div style="padding: 50px;">

    </div>
</body>