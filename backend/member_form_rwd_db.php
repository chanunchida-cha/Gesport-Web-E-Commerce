<meta charset="utf-8">
<?php
include('conect.php');
	$member_id  = $_POST["member_id"];
	$m_pass1  = sha1($_POST["m_pass1"]);
	$m_pass2  = sha1($_POST["m_pass2"]);

	if($m_pass1 != $m_pass2){
		echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
		echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=member'; ";
		echo "</script>";
	}else{
	$sql = "UPDATE tbl_member SET 
	m_pass ='$m_pass1'
	WHERE member_id=$member_id
	 ";
	$result = mysqli_query($conn, $sql) ;
	}
	mysqli_close($conn);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไข password สำเร็จ');";
	echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=member'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'http://localhost/gesport/bootstrap/index.php?act=member'; ";
	echo "</script>";
}
?>