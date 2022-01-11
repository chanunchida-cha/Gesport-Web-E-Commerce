<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
include('./conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('header.php');
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_member WHERE member_id=$ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>

<form action="../backend/member_form_rwd_db.php" method="post" class="form-horizontal">
  <div class="contain-member-rwd">
    <div class="topic">เปลี่ยนรหัสผ่าน</div>
    <p></p>
    <div class="form-group">
      <div class="col-topic">
        Username :
      </div>
      <div>
        <input type="text" name="m_user" required class="form" autocomplete="off" value="<?php echo $row['m_user']; ?>" disabled>
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic">
        New Password :
      </div>
      <div>
        <input type="password" name="m_pass1" required class="form">
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic">
        Confirm Password :
      </div>
      <div>
        <input type="password" name="m_pass2" required class="form">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-4">
        <input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
        <button type="submit" class="btn-add">บันทึก</button>
        <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>
      </div>
    </div>
  </div>
</form>