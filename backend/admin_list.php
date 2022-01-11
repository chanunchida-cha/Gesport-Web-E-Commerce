<link rel="stylesheet" href="../backend/style.css">

<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">



<?php
include('header.php');
// error_reporting( error_reporting() & ~E_NOTICE );
//1. เชื่อมต่อ database:
include('./backend/conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_admin:
$query = "SELECT * FROM tbl_admin ORDER BY a_id ASC";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
$row_am = mysqli_fetch_assoc($result);
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
<p></p>
<a href="../bootstrap/index.php?act=add" class="btn-add">เพิ่มผู้ดูแลระบบ</a>
<p></p>
<br>
<table class="table table-hover" id="example1" align="center">
  <thead class="table-dark">
    <tr class="info">
      <th>ID</th>
      <th>username</th>
      <th>ชื่อผู้ดูแลระบบ</th>
      <th>รหัสผ่าน</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
    <?php do { ?>

      <tr>
        <td><?php echo $row_am['a_id']; ?></td>
        <td><?php echo $row_am['a_user']; ?></td>
        <td><?php echo $row_am['a_name']; ?></td>
        <td><a href="../bootstrap/index.php?act=rwd&ID=<?php echo $row_am['a_id']; ?>" class="btn-password btn-sm"> รหัสผ่าน </a> </td>
        <td><a href="../bootstrap/index.php?act=edit&ID=<?php echo $row_am['a_id']; ?>" class="btn-edit btn-sm"> แก้ไข </a> </td>
        <td><a href="../bootstrap/index.php?act=del_admin&ID=<?php echo $row_am['a_id']; ?>" class='btn-del btn-sm' onclick="return confirm('ยืนยันการลบ')">ลบ</a> </td>
      </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  <tbody>

</table>