<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">

<?php
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$member_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE member_id='$member_id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('../backend/header.php');?>
<form  name="register" action="../backend/member_form_edit_db.php" method="POST" class="form-horizontal">
<div class="contain-member-edit">
<div class="topic">แก้ไขข้อมูลสมาชิก</div><p></p>
<input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />

       <div class="form-group">
          <div >
          <div class="col-topic" align="left">Username: <p></p>
            <input  name="m_user" type="text" required class="form-control" id="m_user" value="<?=$m_user;?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div> <p></p>
        <div class="form-group">
          <div >
          <div class="col-topic" align="left">Password: <p></p>
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" value="<?=$m_pass;?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" disabled />
          </div>
        </div>
        <p></p>
        <div class="form-group">
          <div >
          <div class="col-topic" align="left">ชื่อ-สกุล: <p></p>
            <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?=$m_name;?>" placeholder="ชื่อ-สกุล " />
          </div>
          <p></p>
        </div>
        <div class="form-group">
          <div >
          <div class="col-topic" align="left">Email: <p></p>
            <input  name="m_email" type="email" class="form-control" id="m_email" value="<?=$m_email;?>"  placeholder=" อีเมล์ name@hotmail.com"/>
          </div>
          <p></p>
        </div>
        <div class="form-group">
        <div class="col-topic" align="left">เบอร์โทรศัพท์: <p></p>
          <div >
            <input  name="m_tel" type="text" class="form-control" id="m_tel" value="<?=$m_tel;?>"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div>
        <p></p>
        <div class="form-group">
          <div >
          <div class="col-topic" align="left">ที่อยู่: <p></p>
            <textarea name="m_address" class="form-control" id="m_address"  required><?php echo $m_address; ?></textarea> 
          </div>
        </div>
        <p></p>
      <div class="form-group">
          <div >

          <button type="submit" class="btn-add" id="btn"><span class="glyphicon glyphicon-ok"></span> แก้ไขข้อมูล  </button>
          <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>  
          </div>     
      </div>
      </div>
      </form>