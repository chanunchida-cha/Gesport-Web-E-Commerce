<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('header.php');
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="contain-product-add">
  <div class="row">
    <form name="addproduct" action="../backend/product_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
        <div class="col-topic">ชื่อสินค้า: <p></p>
          <input type="text" name="p_name" class="form" required placeholder="ชื่อสินค้า" autocomplete="off" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-topic">
          <p> ประเภทสินค้า: </p>
          <select name="type_id" class="form" required>
            <option value="">--ประเภทสินค้า--</option>
            <?php foreach ($result as $results) { ?>
              <option value="<?php echo $results["type_id"]; ?>">
                <?php echo $results["type_name"]; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-topic">
        <p>ราคา:</p>
        <input type="int" name="p_price" class="form" required placeholder="ราคา" / value="<?php echo $p_price; ?>" autocomplete="off">
      </div>
      <div class="col-topic">
        <p></p>
        <p>จำนวน:</p>
        <input type="int" name="p_stock" class="form" required placeholder="จำนวน" / value="<?php echo $p_stock; ?>" autocomplete="off">
      </div>
      <div class="form-group">
        <div class="col-topic">
          <p> รายละเอียดสินค้า </p>
          <textarea name="p_detail" rows="5" cols="48" autocomplete="off"></textarea>
        </div>
      </div>
      <div class="form-group">

        <div class="col-topic">
          <p> ภาพสินค้า: </p>
          <input type="file" name="p_img" id="p_img" class="form-control" required />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" class="btn-add" name="btnadd"> บันทึก </button>
          <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>

        </div>
      </div>
    </form>
  </div>
</div>