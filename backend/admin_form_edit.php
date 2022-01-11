<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
include('header.php');
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$a_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_admin WHERE a_id='$a_id' ";
$result = mysqli_query($conn, $sql) ;
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('header.php');?>
<form  name="admin" action="../backend/admin_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
<div class="contain-admin-edit">
<div class="topic">แก้ไขข้อมูลผู้ดูแลระบบ</div><p></p>
  <br>
  
    <input type="hidden" name="a_id" value="<?php echo $a_id;?>">
          <div class="form-group">
            <div >
            <div class="col-topic" align="left">Username: <p></p>
              <input name="a_user" type="text" required class="form" id="a_user" value="<?=$a_user;?>" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div>
          </div>
          <p></p>
        
          <div class="form-group">
            <div >
            <div class="col-topic" align="left">Password: <p></p>
              <input  name="a_pass" type="password" class="form" required  id="a_pass" value="<?=$a_pass;?>"  placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" disabled />
            </div>
          </div>
          <div class="form-group">
            <p></p>
            <div >
            <div class="col-topic" align="left">ชื่อ-สกุล: <p></p>
              <input  name="a_name" type="text" required class="form"  id="a_name" value="<?php echo $row['a_name'];?>" placeholder="ชื่อ-สกุล" />
            </div>
          </div>
          
          <div class="form-group">
           <p></p>
            <div>
              <button type="submit" class="btn-add" id="btn"> <span></span> บันทึก  </button>
              <button onclick="window.history.go(-1); return false;">ย้อนกลับ</button>      
              <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>      
            </div> 
          </div>
          </div>
        </form>