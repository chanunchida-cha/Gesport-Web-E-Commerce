<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$type_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_type WHERE type_id='$type_id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('header.php'); ?>

<p> </p>

<form name="admin" action="../backend/type_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
  <div class="contain-typ-edit">
    <div class="topic">แก้ไขข้อมูลปรเภทสินค้า</div>
    <p></p>
    <input type="hidden" name="type_id" value="<?php echo $type_id; ?>" />
    <div class="form-group">
      <div>
        <div class="col-topic" align="left">ประเภทสินค้า: <p></p>
          <input name="type_name" type="text" required class="form" id="type_name" value="<?= $type_name; ?>" placeholder="ประเถทสินค้า" minlength="2" />
        </div>
      </div>
      <p></p>
      <div class="form-group">
        <div>
          <button type="submit" class="btn-add" id="btn"> บันทึก </button>
          <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>
        </div>
      </div>
    </div>
</form>