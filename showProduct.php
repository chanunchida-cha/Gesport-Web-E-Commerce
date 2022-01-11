<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./style.css"> -->

  <title>Gesport</title>

  <!-- <style>
    /* @media screen and (max-width: 1000) {
      img{
        width: 100%;
      }
    } */
    img {
      max-width: 100%;
      width: 100%;
      object-fit: cover;
      margin: 0;
    }

    body {
      overflow-x: hidden;
    }
  </style> -->
</head>

<body style="font-family: 'Kanit', sans-serif; background-color:#FAF9F8;">
  <?php include('./backend/conect.php');
   ?>
  


  <body>
    <div>
      <?php include('./nav.php') ?>

      <center>
        <div style="background-color: #1F2436; margin-top:100px;">

          <img src="./img/banner13.png">
        </div>
        <br>
      </center>

      <br><br>
      <?php
      $act = (isset($_GET['act']) ? $_GET['act'] : '');
      $q = (isset($_GET['q']) ? $_GET['q'] : '');
      if ($act == 'showbytype') {
        include('./show_product_type.php');
      }elseif($q !=''){
        include('./show_product_q.php');
      }
       else {
        include('./show_product.php');
      }

      ?>

    </div>
    </div>
    </div>
    <div style="background-color: #1F2436; padding-top:50px; padding-bottom:30px; ">

<p style="text-align: center; color:white; margin-top:20px; margin-top:80px;">© 2021 GESPORT. All Rights Reserved.</p>


</div>

  </body>

</html>