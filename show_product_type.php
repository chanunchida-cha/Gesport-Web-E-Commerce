<?php
include('./backend/header.php');


$type_id = $_GET['type_id'];
// echo $type_id;
// exit();
$query_product_type ="SELECT * FROM tbl_product  as p
INNER JOIN tbl_type as t
ON p.type_id  = t.type_id
WHERE p.type_id = $type_id
ORDER BY p.p_id ASC";
$result_pro =mysqli_query($conn, $query_product_type) ;
// echo($query_product_type);
// exit()



?>
<div class="container" >
<div class="row" style="padding-left: 80px;">

<?php foreach ($result_pro as $row_pro){ ?>
<div class="card border-light mb-3" style="width: 15rem;">
    <img class="card-img-top" src="./backend/p_img/<?php echo $row_pro['p_img']?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title" style="font-family: 'Kanit', sans-serif;"><?php echo $row_pro['p_name'] ?></h5>
        <p class="card-text" style="font-family: 'Kanit', sans-serif;"><?php echo $row_pro['type_name']; ?></p>
        <h6 class="card-title" style="font-family: 'Kanit', sans-serif;">ราคา <?php echo $row_pro['p_price'] ?> บาท</h3>
        <h6 class="card-title" style="font-family: 'Kanit', sans-serif;">คงเหลือ <?php echo $row_pro['p_stock'] ?> </h3>
                                <?php if ($row_pro['p_stock'] > 0) { ?>
                                    <a href="cart2.php?p_id=<?php echo $row_pro['p_id'] ?>&act=add" class="btn btn-primary btn-sm" style="font-family: 'Kanit', sans-serif;">หยิบใส่ตะกร้า</a>
                                <?php } else {
                                    echo '<button class="btn btn-dark  btn-sm" style="font-family: "Kanit", sans-serif;" disabled>สินค้าหมด</button>';
                                } ?>
                                &nbsp
            <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>"
                class="btn btn-light btn-sm">รายละเอียด</a>
    </div>
</div>
&nbsp&nbsp&nbsp
<?php } ?>

</div>
</div>
