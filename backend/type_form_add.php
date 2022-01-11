<link rel="stylesheet" href="../backend/style.css">
<link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php include('header.php');?>

<div class="contain-type-add">
  <div class="topic">เพิ่มประเภทสินค้า</div><p></p>
    <div >
      <div >
        <form  name="admin" action="../backend/type_form_add_db.php" method="POST" id="admin" class="form-horizontal">
          <div class="form-group">
            <div class="col-topic" align="left"> ประเภทสินค้า: <p></p>
              <input  name="type_name" type="text" required class="form" id="type_name" placeholder="ประเภทสินค้า"   minlength="2" autocomplete="off" />
            </div>
          </div>
          <div class="form-group">
            <div >
              <button type="submit" class="btn-add" id="btn"> บันทึก </button> 
              <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>       
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>