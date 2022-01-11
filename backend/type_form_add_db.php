<?php
error_reporting(0);
include('conect.php');

$type_name = $_POST['type_name'];

$check =  " SELECT  type_name
FROM tbl_type
WHERE  type_name = '$type_name' 
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

$sql ="INSERT INTO tbl_type
    
    (type_name) 

    VALUES 

    ('$type_name')";
    
    $result = mysqli_query($conn, $sql) ;
    mysqli_close($conn);
  }
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='http://localhost/gesport/bootstrap/index.php?act=type_product'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      //echo "alert('มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครั้ง');";
      echo "</script>";
    }
?>