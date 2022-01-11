<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
      include('header.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('.conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_bank ORDER BY bid ASC" ;
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($conn, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
  <p></p>
  <a href="../bootstrap/index.php?act=add_bank" class="btn-add" >เพิ่มข้อมูลธนาคาร</a><p></p>
  <table class="table table-hover" id="example1" align="center"  >
  <thead  class="thead-dark">
    <tr class="info">    
    <th>ID</th>
    <th>ชื่อธนาคาร</th>
    <th>เลขบัญชี</th>
    <th>ชื่อบัญชี</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['bid']; ?></td>
      <td><?php echo $row_am['bname']; ?></td>
      <td ><?php echo $row_am['bnumber']; ?></td>
      <td ><?php echo $row_am['bowner']; ?></td>
      <td><a href="../bootstrap/index.php?act=bank_edit&ID=<?php echo $row_am['bid']; ?>" class="btn-edit"> แก้ไข </a> </td>
       <td><a href="../bootstrap/index.php?act=del_bank&ID=<?php echo $row_am['bid']; ?>" class='btn-del'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 