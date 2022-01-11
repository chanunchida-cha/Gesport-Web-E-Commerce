<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('header.php');
$p_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT p.*,t.type_name
FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.type_id = t.type_id
WHERE p.p_id = '$p_id'
ORDER BY p.type_id asc";
$result2 = mysqli_query($conn, $sql) ;
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>

  <div class="row">
      <form  name="addproduct" action="../backend/product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <div class="contain-product-edit">
      <div class="topic">แก้ไขข้อมูลสินค้า</div><p></p>
        <div class="form-group">
          <div>
          <div class="col-topic" align="left">ชื่อสินค้า: <p></p>
            <input type="text"  name="p_name" class="form" required placeholder="ชื่อสินค้า" / value="<?php echo $p_name; ?>">
          </div>
        </div><p></p>
         <div class="form-group">
          <div >
          <div class="col-topic" align="left">ประเภทสินค้า: <p></p>
            <select name="type_id" class="form" required>
              <option value="<?php echo $row["type_id"];?>">
                <?php echo $row["type_name"]; ?>
              </option>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div><p></p>
        </div>
        <div >
        <div class="col-topic" align="left">ราคา: <p></p>
            <input type="int"  name="p_price" class="form" required placeholder="ราคา" / value="<?php echo $p_price; ?>">
          </div>
          <p></p>
          <div >
          <div class="col-topic" align="left">จำนวน: <p></p>
            <input type="int"  name="p_stock" class="form" required placeholder="จำนวน" / value="<?php echo $p_stock; ?>">
          </div>
          <p></p>
        <div class="form-group">
          <div >
          <div class="col-topic" align="left">รายละเอียดสินค้า: <p></p>
             <textarea  name="p_detail" rows="5" cols="48"><?php echo $p_detail; ?>
             </textarea>
          </div>
          <P></P>
        </div>
            <div class="form-group">
          <div >
          <div class="col-topic" align="left">ภาพสินค้า: <p></p>
            <img src="../backend/p_img/<?php echo $row['p_img'];?>" width="100px">
            <br>
            <br>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
          <p></p>
        </div>
        <div class="form-group">
          <div >
             <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
             <input type="hidden" name="img2" value="<?php echo $p_img; ?>" />
            <button type="submit" class="btn-add" name="btnadd"> บันทึก </button>
            <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>  
            <p></p>
            <p></p>
            
          </div>
        </div>
            </div>
      </form>
    </div>
  </div>