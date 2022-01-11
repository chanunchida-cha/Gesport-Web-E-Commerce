<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
include('header.php');
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);

//คิวรี่จำนวน
$query2 = "SELECT COUNT(p_id) as countsold FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
WHERE p.p_stock < 1
ORDER BY p.p_id DESC";
$result2 = mysqli_query($conn, $query2);
$rows2 = mysqli_fetch_array($result2);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      "aaSorting": [
        [0, 'ASC']
      ],
      //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
    });
  });
</script>
<a href="../bootstrap/index.php?act=product_add" class="btn-add">เพิ่มสินค้า</a>
<a href="../bootstrap/index.php?act=soldout" class="btn btn-danger">สินค้าหมด <span class="badge badge-light"><?php echo $rows2 ['countsold']; ?></span></a>

<p></p>
<table class="table table-hover" id="example1" align="center">
  <thead class="thead-dark">
    <tr>
      <th width='5%'>ID</th>
      <th width=25%>ประเภทสินค้า</th>
      <th width=30%>ชื่อสินค้า</th>
      <th width=25%>ราคา</th>
      <th width=25%>จำนวน</th>
      <th width=25%>รูป</th>
      <th width=5%>แก้ไข</th>
      <th width=5%>ลบ</th>
    </tr>
  </thead>
  <?php while ($row = mysqli_fetch_array($result)) { ?>
    <tr>

      <?php if ($row['p_stock'] < 1) { ?>
        <td style="color:red;"> <?php echo $row["p_id"]; ?></td>
        <td style="color:red;"><?php echo  $row["type_name"]; ?></td>
        <td style="color:red;"><?php echo $row["p_name"]; ?></td>
        <td style="color:red;"><?php echo $row["p_price"]; ?></td>
        <td style="color:red;"><?php echo $row["p_stock"]; ?></td>
      <?php } else { ?>
        <td> <?php echo $row["p_id"]; ?></td>
        <td><?php echo  $row["type_name"]; ?></td>
        <td><?php echo $row["p_name"]; ?></td>
        <td><?php echo $row["p_price"]; ?></td>
        <td><?php echo $row["p_stock"]; ?></td>
      <?php } ?>

      <?php echo "<td align=center>" . "<img src='../backend/p_img/$row[p_img]' width='50'>" . "</td>"; ?>

      <?php echo "<td><a href='../bootstrap/index.php?act=product_edit&ID=$row[0]' class='btn-edit'>แก้ไข</a></td> "; ?>

      <?php echo "<td><a href='../backend/product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn-del'>ลบ</a></td> "; ?>
    </tr>

  <?php  } ?>
</table>
<p>

</p>
<p>

</p>
<p>

</p>