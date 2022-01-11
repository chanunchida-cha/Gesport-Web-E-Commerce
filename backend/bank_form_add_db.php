<?php
error_reporting(0);
include('conect.php');

$bname = $_POST['bname'];
$bnumber = $_POST['bnumber'];
$bowner = $_POST['bowner'];

$check =  "
	SELECT bnumber 
	FROM tbl_bank
	WHERE  bnumber = '$bnumber' 
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

$sql ="INSERT INTO tbl_bank
    
    (bname,  bnumber, bowner) 

    VALUES 

    ('$bname', '$bnumber', '$bowner')";
    
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql ") ;
    mysqli_close($conn);
}

    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลสำเร็จ');";
      echo "window.location ='http://localhost/gesport/bootstrap/index.php?act=bank'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      //echo "alert('มีบางอย่างผิดพลาด!');";
      echo "window.location ='http://localhost/gesport/bootstrap/index.php?act=bank'; ";
      echo "</script>";
    }
