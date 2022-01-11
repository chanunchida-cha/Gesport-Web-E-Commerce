<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../backend/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
  <title>Document</title>

</head>

<body>
  <a href="../bootstrap/index.php?act=add_member" class="btn-add">เพิ่มสมาชิก</a>
  <p></p>

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


  <?php
  include('header.php');
  //1. เชื่อมต่อ database:
  include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //2. query ข้อมูลจากตาราง tb_admin:
  $query = "SELECT * FROM tbl_member ORDER BY member_id ASC";
  //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
  $result = mysqli_query($conn, $query);
  //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
  echo '<div class="table-responsive-lg" >';
  echo ' <table class="table table-hover"  id="example1" align="center"  >';

  //หัวข้อตาราง 

  echo "
                    <thead class='thead-dark'>
                      <tr>
                      <td bgcolor=#212529><font color='#fff'>ID</font></td>
                      <td bgcolor=#212529><font color='#fff'>username</font></td>
                      <td bgcolor=#212529><font color='#fff'>ชื่อ</font></td>
                      <td bgcolor=#212529><font color='#fff'>Email</font></td>
                      <td bgcolor=#212529><font color='#fff'>ที่อยู่</font></td>
                      <td bgcolor=#212529><font color='#fff'>รหัสผ่าน</font></td>
                      <td bgcolor=#212529><font color='#fff'>แก้ไข</font></td>
                      <td bgcolor=#212529><font color='#fff'>ลบ</font></td>                 
                    </tr>
                    </thead>
                   
                    ";


  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["member_id"] .  "</td> ";
    echo "<td>" . $row["m_user"] .  "</td> ";
    echo "<td>" . $row["m_name"] .  "</td> ";
    echo "<td>" . $row["m_email"] .  "</td> ";
    echo "<td>" . $row["m_address"] .  "</td> ";
    //แก้ไขข้อมูล
    echo "<td><a class='btn-password btn-sm' href=' ../bootstrap/index.php?act=rwd_member&ID=" . $row["member_id"] . " '>รหัสผ่าน</a>";
    echo "<td><a class='btn-edit btn-sm' href=' ../bootstrap/index.php?act=edit_member&ID=" . $row["member_id"] . " '>แก้ไข</a>";
    //ลบข้อมูล
    echo "<td><a class='btn-del btn-sm' href='../backend/member_del_db.php?ID=" . $row["member_id"] . "'>ลบ</a>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
  //5. close connection
  mysqli_close($conn);
  ?>

</body>