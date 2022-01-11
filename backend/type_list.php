<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
include('header.php');
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_admin:
$query = "SELECT * FROM tbl_type ORDER BY type_id ASC" ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
<a href="../bootstrap/index.php?act=add_type" class="btn-add" >เพิ่มประเภทสินค้า</a><p></p>
<table class="table table-hover" id="example1" align="center">
<thead  class="thead-dark" >
     <tr>
      <th width='5%'>ID</th>
      <th width=25%>ประเภทสินค้า</th>
      <th width=5%>แก้ไข</th>
      <th width=5%>ลบ</th>
    </tr>
    </thead>
  <?php while($row = mysqli_fetch_array($result)) { ?>
   <tr>
     <td> <?php echo $row["type_id"] ; ?></td>
     <td> <?php echo $row["type_name"] ; ?></td>
    
    

     <?php echo "<td><a href='../bootstrap/index.php?act=edit_type&ID=$row[0]' class='btn-edit'>แก้ไข</a></td> "; ?>
    
     <?php echo "<td><a href='../backend/type_del_db.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการลบ')\" class='btn-del'>ลบ</a></td> "; ?>
   </tr>
<?php  } ?>
 </table>
