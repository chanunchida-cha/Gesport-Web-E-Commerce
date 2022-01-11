<?php
// print_r($_POST);
// exit();
session_start();
        if(isset($_POST['a_user'])){
                  include("./backend/conect.php");
                  $a_user = $_POST['a_user'];
                  $a_pass = sha1($_POST['a_pass']);
                  // print_r($a_user);
                  // print_r($a_pass);
                  // exit();

                  $sql="SELECT * FROM tbl_admin
                  WHERE  a_user='".$a_user."' 
                  AND  a_pass='".$a_pass."' ";
                  $result = mysqli_query($conn,$sql);

                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["user_id"] = $row["a_id"];
                        $_SESSION["a_name"] = $row["a_name"];
                        // print_r($_SESSION);
                        // // print_r($a_pass);
                        // exit();

                      if($_SESSION["user_id"]!=''){

                        Header("Location: bootstrap/index.php");
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }
        }else{

             Header("Location: login.php"); //user & password incorrect back to login again

        }
