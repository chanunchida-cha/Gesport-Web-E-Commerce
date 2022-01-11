<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<?php
//1. เชื่อมต่อ database:
include('../backend/conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
include('../member/header.php');
?>
<?php
$m_user = $_SESSION['username'];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE m_user='$m_user' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('check.php'); ?>
<form name="register" action="member_form_edit_db.php" method="POST" class="form-horizontal">
  <div class="contain-member-edit">
    <div class="topic">แก้ไขข้อมูลส่วนตัว</div>
    <p></p>
 
      <input type="hidden" name="m_user" value="<?php echo $m_user; ?>">
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">Username:</div><p></p>
          <input name="m_user" type="text" required class="form-control" id="m_user" value="<?= $m_user; ?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" disabled />
        </div>
      </div>
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">Password:</div><p></p>
          <input name="m_pass" type="password" required class="form-control" id="m_pass" value="<?= $m_pass; ?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" disabled  />
        </div>
      </div>
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">ชื่อ-สกุล:</div><p></p>
          <input name="m_name" type="text" required class="form-control" id="m_name" value="<?= $m_name; ?>" placeholder="ชื่อ-สกุล " />
        </div>
      </div>
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">Email:</div><p></p>
          <input name="m_email" type="email" class="form-control" id="m_email" value="<?= $m_email; ?>" placeholder=" อีเมล์ name@hotmail.com" />
        </div>
      </div>
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">เบอร์โทรศัพท์:</div><p></p>
          <input name="m_tel" type="text" class="form-control" id="m_tel" value="<?= $m_tel; ?>" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
        </div>
      </div>
      <div class="form-group">
        <div>
        <div class="col-topic" align="left">ที่อยู่:</div><p></p>
          <textarea name="m_address" class="form-control" id="m_address" value="<?= $m_address; ?>" required><?php echo $m_address; ?> </textarea>
        </div>
      </div>
      <div class="form-group">
        <div>

          <button type="submit" class="btn-add btn-md" id="btn"><span class="glyphicon glyphicon-ok"></span> แก้ไขข้อมูล </button>
          <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>
        </div>
      </div>

    </div>
</form>