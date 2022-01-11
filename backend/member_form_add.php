<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php include('header.php'); ?>
<div class="contain-member-add">
  <form name="register" action="../backend/member_form_add_db.php" method="POST" class="form-horizontal">

    <div class="form-group">

      <div class="topic">เพิ่มสมาชิก</div>
      <p></p>

      <div class="col-topic" align="left">Username: <p></p>
        <input name="m_user" type="text" required class="form" id="m_user" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" autocomplete="off" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic" align="left">Password: <p></p>
        <input name="m_pass" type="password" required class="form" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic" align="left">ชื่อ-สกุล: <p></p>
        <input name="m_name" type="text" required class="form" id="m_name" placeholder="ชื่อ-สกุล " autocomplete="off" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic" align="left">Email: <p></p>
        <input name="m_email" type="email" class="form" id="m_email" placeholder=" อีเมล์ name@hotmail.com" autocomplete="off" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic" align="left">เบอร์โทรศัพท์: <p></p>
        <input name="m_tel" type="text" class="form" id="m_tel" placeholder="เบอร์โทร ตัวเลขเท่านั้น" autocomplete="off"  />
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic" align="left">ที่อยู่: <p></p>
        <textarea name="m_address" class="form" id="m_address" required placeholder="ที่อยู่" autocomplete="off" ></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-topic">
        <button type="submit" class="btn-add" id="btn"><span class="glyphicon glyphicon-ok"></span> เพิ่มสมาชิก </button>
        <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>  
      </div>
    </div>

  </form>
</div>