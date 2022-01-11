<?php
session_start();
error_reporting(0);

// echo '<pre>';
// print_r($_SESSION);
// echo'</pre>';
include('./backend/conect.php');
include('./nav.php');
$member_id = $_SESSION['member_id'];


?>

<p></p>
<?php    ?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;500&display=swap" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <title>GESPORT</title>
    <?php if ($_SESSION['username'] == '') { ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'มีบางอย่างผิดปกติ!',
                text: 'กรุณา login ก่อนทำการสั่งซื้อ',
                confirmButtonText: 'ตกลง',
                allowEscapeKey: false,
                footer: '<a href="index.php">ย้อนกลับไปหน้าแรก</a>'
            }).then(function() {
                window.location.href = "index.php";
            });
        </script>

    <?php }
    if ($_SESSION['username'] == '') { // หาก Error ให้ลบอันนี้เป็นอันดับแรก
        unset($_SESSION['cart']); //  หาก Error ให้ลบอันนี้เป็นอันดับแรก
    } ?>
    <?php if ($_SESSION['username'] == '') { ?>

        <script>
            Swal.fire({
                icon: 'error',
                title: 'มีบางอย่างผิดปกติ!',
                text: 'กรุณา login ก่อนทำการสั่งซื้อ',
                confirmButtonText: 'ตกลง',
                allowEscapeKey: false,
                footer: '<a href="index.php">ย้อนกลับไปหน้าแรก</a>'
            }).then(function() {
                window.location.href = "index.php";
            });
        </script>

    <?php }
    if ($_SESSION['username'] == '') { // หาก Error ให้ลบอันนี้เป็นอันดับแรก
        unset($_SESSION['cart']); //  หาก Error ให้ลบอันนี้เป็นอันดับแรก
    } ?>
</head>

<body style="font-family: 'Kanit', sans-serif;">
    <h5 style="margin-top: 140px; margin-left: 205px;  "> ยืนยันการสั่งซื้อ </h5>
    <!-- Start Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <form id="frmcart" name="frmcart" method="post" action="./saveoreder2.php">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th width="5%" bgcolor="#212529" style="font-family: 'Kanit', sans-serif;">
                                <font color='#fff'>#</font>
                            </th>
                            <th width="10%" bgcolor="#212529" style="font-family: 'Kanit', sans-serif;">
                                <font color='#fff'>รูปสินค้า</font>
                            </th>
                            <th width="55%" bgcolor="#212529">
                                <font color='#fff'>สินค้า</font>
                            </th>
                            <th width="10%" align="center" bgcolor="#212529">
                                <font color='#fff'>ราคา</font>
                            </th>
                            <th width="10%" align="center" bgcolor="#212529">
                                <font color='#fff'>จำนวน</font>
                            </th>
                            <th width="5%" align="center" bgcolor="#212529">รวม(บาท)</th>

                        </tr>
                        <?php
                        $total = 0;
                        if (!empty($_SESSION['cart'])) {
                            include("./backend/conect.php");
                            foreach ($_SESSION['cart'] as $p_id => $qty) {
                                $sql = "select * from tbl_product where p_id=$p_id";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($query);
                                $sum = $row['p_price'] * $qty;
                                $total += $sum;
                                echo "<tr>";
                                echo "<td bgcolor='#fff'>" . @$i += 1 . "</td>";
                                echo "<td  bgcolor='#fff'>" . "<img src ='./backend/p_img/" . $row['p_img'] . "'width='50'>" . "</td>";
                                echo "<td  bgcolor='#fff'>" . $row["p_name"] . "</td>";
                                echo "<td  align='right' bgcolor='#fff'>" . number_format($row["p_price"], 2) . "</td>";
                                echo "<td  align='right' bgcolor='#fff'>";
                                echo "<input  bgcolor='#fff' type='number' name='amount[$p_id]' value='$qty' class='form-control' min='1' readonly /></td>";
                                echo "<td  align='right' bgcolor='#fff'>" . number_format($sum, 2) . "</td>";
                                echo "</tr>";
                            } //close foreach
                            echo "<tr>";
                            echo "<td colspan='5' bgcolor='#fff' align='center'><b>ราคารวม</b></td>";
                            echo "<td align='right' bgcolor='#fff'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </table>




                    <h5>รายละเอียดที่อยู่สำหรับจัดส่งสินค้า</h5>

                    <h8>กรุณากรอกรายละเอียดในการจัดส่งสินค้า</h8>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="inputEmail4" name="m_name" value="<?php echo $_SESSION['m_name'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="m_email" value="<?php echo $_SESSION['m_email'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">เบอร์โทรที่ติดต่อสะดวก</label>
                            <input type="text" class="form-control" id="inputEmail4" name="m_tel" value="<?php echo $_SESSION['m_tel'] ?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">ที่อยู่</label>
                        <input type="text" class="form-control" id="inputAddress" name="m_address" value="<?php echo $_SESSION['m_address'] ?>"></>
                    </div>
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <input type="hidden" name="member_id" value="<?php echo $_SESSION['member_id']; ?>">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

                    <button type="submit" class="btn btn-primary">สั่งซื้อสินค้า</button>
                    <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>


                </form>
            </div>
        </div>
    </div>
    <div style="padding: 50px;">

    </div>
</body>

</html>