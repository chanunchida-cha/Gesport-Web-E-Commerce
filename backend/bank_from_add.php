<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php include('header.php'); ?>

<form name="admin" action="../backend/bank_form_add_db.php" method="POST" id="admin" class="form-horizontal">
  <div class="contain-admin-add">
    <div class="form-group">
      <div class="topic">เพิ่มข้อมูลธนาคาร</div>
      <p></p>

      <div class="col-topic" align="left">ชื่อธนาคาร: <p></p>
        <input name="bname" type="text" required class="form" id="bname" placeholder="ชื่อธนาคาร" autocomplete="off" />
      </div>
    </div>

    <div class="form-group">

      <div class="col-topic" align="left">เลขบัญชี: <p></p>
        <input name="bnumber" type="text" required class="form" id="bnumber" placeholder="เลขบัญชี" autocomplete="off" />
      </div>
    </div>
    <div class="form-group">

      <div class="col-topic" align="left">ชื่อบัญชี: <p></p>
        <input name="bowner" type="text" required class="form" id="bowner" placeholder="ชื่อบัญชี" autocomplete="off" />
      </div>
    </div>

    <div class="form-group">
      <div class="col"> </div>
      <div class="col">
        <button type="submit" class="btn-add" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก </button>
        <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick=window.history.back() value="ยกเลิก"> </input>
      </div>
    </div>
  </div>
</form>