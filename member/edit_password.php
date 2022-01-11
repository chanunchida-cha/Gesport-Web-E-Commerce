<link rel="stylesheet" href="../backend/style.css">
<?php
//1. เชื่อมต่อ database:
include('../backend/conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('../member/header.php');
error_reporting(0);
$m_user = $_SESSION['username'];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE m_user='$m_user' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('check.php'); ?>
<form name="register" action="edit_password_db.php" method="POST" class="form-horizontal">
  <div class="contain-member-rwd">
    <div class="topic">เปลี่ยนรหัสผ่าน</div>
    <p></p>
    <input type="hidden" name="m_user" value="<?php echo $m_user; ?>">
    <div class="form-group">
      <div>
        <div class="col-topic">Username :</div>
        <input name="m_user" type="text" required class="form-control" id="m_user" value="<?= $m_user; ?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" disabled />
      </div>
    </div>
    <div class="form-group">
      <div>
        <div class="col-topic">New Password :</div>
        <input name="m_pass1" type="password" required class="form-control" id="m_pass1" placeholder="New Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
      </div>
    </div>
    <div class="form-group">
      <div>
        <div class="col-topic">Confirm Password :</div>
        <input name="m_pass2" type="password" required class="form-control" id="m_pass2" placeholder=" Comfirm Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
      </div>
    </div>
    <div class="form-group">
      <div>
        <button type="submit" class="btn-add" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก </button>
        <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>
      </div>
    </div>
  </div>
</form>