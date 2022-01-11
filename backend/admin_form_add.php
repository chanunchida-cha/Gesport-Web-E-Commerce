<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php include('header.php'); ?>

<form  name="admin" action="../backend/admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">
<div  class="contain-admin-add">
          <div class="form-group">
            <div class="topic">เพิ่มผู้ดูแลระบบ</div><p></p>
           
            <div class="col-topic" align="left">Username: <p></p>
              <input  name="a_user" type="text" required class="form" id="a_user" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" autocomplete="off" />
            </div>
          </div>
          
          <div class="form-group">
             
          <div class="col-topic" align="left">Password: <p></p>
              <input  name="a_pass" type="password" required class="form" id="a_pass" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" autocomplete="off" />
            </div>
          </div>
          <div class="form-group">
           
            <div class="col-topic" align="left">ชื่อ-สกุล: <p></p>
              <input  name="a_name" type="text" required class="form" id="a_name" placeholder="ชื่อ-สกุล" autocomplete="off" />
            </div>
          </div>
          
          <div class="form-group">
            <div class="col"> </div>
            <div class="col" >
              <button type="submit" class="btn-add" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>    
              <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>    
            </div> 
          </div>
          </div>
        </form>