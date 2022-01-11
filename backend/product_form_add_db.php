<meta charset="UTF-8">
<?php
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	//รับค่าไฟล์จากฟอร์ม
$p_name = $_POST['p_name'];
$type_id = $_POST['type_id'];
$p_price = $_POST["p_price"];
$p_stock = $_POST["p_stock"];
$p_detail = $_POST['p_detail'];
$p_img =(isset($_POST['p_img']) ? $_POST['p_img'] :'');

//img
	$upload=$_FILES['p_img'];
	if($upload <> '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path="p_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='p_img'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="p_img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	$check =  " SELECT  p_name
FROM tbl_product
WHERE  p_name = '$p_name' 
";
  $result1 = mysqli_query($conn, $check) ;
  $num=mysqli_num_rows($result1);
	
  if($num > 0)
  {
  echo "<script>";
  echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
  echo "window.history.back();";
  echo "</script>";
  }else{
		$sql = "INSERT INTO tbl_product
		(
		p_name,
		type_id,
		p_price,
		p_stock,
		p_detail,
		p_img
		)
		VALUES
		(
		'$p_name',
		'$type_id',
		'$p_price',
		'$p_stock',
		'$p_detail',
		'$newname')";
		
		$result = mysqli_query($conn, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($conn);
	// javascript แสดงการ upload file
	
		}
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('สำเร็จ');";
echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=product'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=product'; ";
echo "</script>";
}
?>