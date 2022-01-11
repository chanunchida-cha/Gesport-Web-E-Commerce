<link rel="stylesheet" href="../backend/style.css">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300&display=swap" rel="stylesheet">
<?php
include('header.php');
//1. เชื่อมต่อ database:
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$bid = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_bank WHERE bid='$bid' ";
$result = mysqli_query($conn, $sql) ;
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('header.php');?>
<form  name="bank" action="../backend/bank_form_edit_db.php" method="POST" id="bank" class="form-horizontal">
<div class="contain-bank-edit">
<div class="topic">แก้ไขข้อมูลธนาคาร</div><p></p>
  <br>
  
    <input type="hidden" name="bid" value="<?php echo $bid;?>">
          <div class="form-group">
            <div >
            <div class="col-topic" align="left">ชื่อธนาคาร: <p></p>
              <input name="bname" type="text" required class="form" id="bname" value="<?=$bname;?>" placeholder="ชื่อธนาคาร"  />
            </div>
          </div>
          <p></p>
        
          <div class="form-group">
            <div >
            <div class="col-topic" align="left">เลขบัญชี: <p></p>
              <input  name="bnumber" type="text" class="form" required  id="bnumber" value="<?=$bnumber;?>"  placeholder="เลขที่บัญชี" pattern="^[a-zA-Z0-9]+$" minlength="2" />
            </div>
          </div>
          <div class="form-group">
            <p></p>
            <div >
            <div class="col-topic" align="left">ชื่อบัญชี: <p></p>
              <input  name="bowner" type="text" required class="form"  id="bowner" value="<?php echo $row['bowner'];?>" placeholder="ชื่อบัญชี" />
            </div>
          </div>
          
          <div class="form-group">
           <p></p>
            <div>
              <button type="submit" class="btn-add" id="btn"> <span></span> บันทึก  </button>      
              <input type="button" class="btn btn-danger" id="btn" style="font-family: 'Kanit', sans-serif;" onclick= window.history.back() value="ยกเลิก">  </input>  
            </div> 
          </div>
          </div>
        </form>