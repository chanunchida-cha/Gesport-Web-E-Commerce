<meta charset="utf-8">
<?php
include('conect.php');
	$a_id  = $_POST["a_id"];
	$a_pass1  = sha1($_POST["a_pass1"]);
	$a_pass2  = sha1($_POST["a_pass2"]);

	if($a_pass1 != $a_pass2){
		echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
		echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=admin'; ";
		echo "</script>";
	}else{
	$sql = "UPDATE tbl_admin SET 
	a_pass ='$a_pass1'
	WHERE a_id=$a_id
	 ";
	$result = mysqli_query($conn, $sql) ;
	}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password สำเร็จ');";
	echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=admin'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=admin'; ";
	echo "</script>";
}
?>