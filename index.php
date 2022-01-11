<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">

  <title>Gesport</title>

  <style>
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
  </style>
</head>

<body>
  <?php include('./backend/conect.php'); ?>
  <?php


  $query_Recommended =
    "SELECT  p.p_id ,SUM(d_qty),p.p_name ,p_img,p_price
  FROM order_detail  as o
  INNER JOIN tbl_product as p
  ON o.p_id  = p.p_id
  GROUP BY p.p_id
  ORDER BY SUM(d_qty) DESC
  LIMIT 8
  ";

  $result_Rec = mysqli_query($conn, $query_Recommended);

  ?>



  <body>

      <?php include('./nav.php') ?>
      <div style="margin-top: 80px;" class="simple-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators center">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="./img/banner7.png">
              <div class="carousel-caption">
                <a href="./showProduct.php" style="scroll-behavior: smooth;">
                  <button class="buttons1" style="margin-left:205px; margin-top:20px; ">
                    SHOP
                  </button>

                </a>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="./img/banner1.png">
              <div class="carousel-caption">
                <a href="./showProduct.php" style="scroll-behavior: smooth;">
                  <button class="buttons2" style="margin-left: 600px; width:150px; ">
                    SHOP
                  </button>
                </a>
              </div>
            </div>
            <div class="carousel-item">
            <a href="./showProduct.php" style="scroll-behavior: smooth;">
              <img class="d-block w-100" src="./img/banner8.png">
              <div class="carousel-caption">
              </a>
                <a href="#allProduct" style="scroll-behavior: smooth;">

                </a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="dot"><span class="carousel-control-prev-icon" aria-hidden="true"></span></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="dot"><span class="carousel-control-next-icon" aria-hidden="true"></span></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <div class="carousel-item active" style="z-index: 99; margin-top: 83px; padding-top:20px; padding-left:360px;">
        <video width="290" height="172" loop controls preload>
          <source src="./img/training_fw21-yts-hp-launch-masthead-t_xwfgmh.mp4" type="video/mp4">

        </video>
      </div>


      <center>
        <div style="background-color:#1F2436; padding:50px;  padding-bottom:0; padding-top:50px; margin-top:-20px">
          <img class="col-md-9" src="./img/banner14.png">
        </div>
      </center>

      <center>
        <div class="carousel-item active">
          <img class="d-block w-100" src="./img/banner9.png">
          <div class="carousel-caption">
            <a href="./showProduct.php" style="scroll-behavior: smooth;">


            </a>
          </div>
        </div>
      </center>


      <!-- card-carousel -->
      <div class="container-fluid" style="background-color:#fff; ">


        <br>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" style="height:250px; ">
            <div class="carousel-item active">
              <div class="d-flex">
                <a href="product_detail.php?id=58" class="w-25 ml-1"> <img src="./img/1.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=54" class="w-25 ml-1"> <img src="./img/2.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=57" class="w-25 ml-1"> <img src="./img/3.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=47" class="w-25 ml-1"> <img src="./img/4.png" class="w-100 ml-1" alt="..."></a>
                <!-- <img src="assets/img/row3.png" class="w-25 ml-1" alt="...">
                        <img src="assets/img/row4.png" class="w-25 ml-1" alt="..."> -->
              </div>
            </div>
            <div class="carousel-item">
              <div class="d-flex">
                <a href="product_detail.php?id=48" class="w-25 ml-1"> <img src="./img/5.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=52" class="w-25 ml-1"> <img src="./img/6.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=55" class="w-25 ml-1"> <img src="./img/7.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=49" class="w-25 ml-1"> <img src="./img/8.png" class="w-100 ml-1" alt="..."></a>
              </div>
            </div>
            <div class="carousel-item">
              <div class="d-flex">
                <a href="product_detail.php?id=56" class="w-25 ml-1"> <img src="./img/9.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=53" class="w-25 ml-1"> <img src="./img/10.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=51" class="w-25 ml-1"> <img src="./img/11.png" class="w-100 ml-1" alt="..."></a>
                <a href="product_detail.php?id=50" class="w-25 ml-1"> <img src="./img/12.png" class="w-100 ml-1" alt="..."></a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <br>
        <center>
          <div style="background-color: #1F2436; padding:50px;  height:450px; padding-bottom:0; padding-top:100px; margin-top:-10px">
            <a href="http://localhost/gesport/showProduct.php?act=showbytype&type_id=2">
              <img class="col-md-9" src="./img/banner10.png">
            </a>
          </div>
        </center>
        <center>
          <div style="background-color: #1F2436; padding-left:50px;  padding-right:50px;  padding-bottom:0; padding-top:0px; margin-top:-23px">
            <a href="http://localhost/gesport/showProduct.php?act=showbytype&type_id=3">
              <img class="col-md-9" src="./img/banner11.png">
            </a>
          </div>
        </center>

        <div style="background-color: #E64441; padding:50px;">
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="height:250px; ">
              <div class="carousel-item active">
                <div class="d-flex">
                  <a href="product_detail.php?id=10" class="w-25 ml-1"> <img src="./img/16.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=37" class="w-25 ml-1"> <img src="./img/17.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=38" class="w-25 ml-1"> <img src="./img/18.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=34" class="w-25 ml-1"> <img src="./img/19.png" class="w-100 ml-1" alt="..."></a>
                  <!-- <img src="assets/img/row3.png" class="w-25 ml-1" alt="...">
                        <img src="assets/img/row4.png" class="w-25 ml-1" alt="..."> -->
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex">
                  <a href="product_detail.php?id=39" class="w-25 ml-1"> <img src="./img/20.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=40" class="w-25 ml-1"> <img src="./img/21.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=41" class="w-25 ml-1"> <img src="./img/22.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=43" class="w-25 ml-1"> <img src="./img/23.png" class="w-100 ml-1" alt="..."></a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex">
                  <a href="product_detail.php?id=35" class="w-25 ml-1"> <img src="./img/24.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=44" class="w-25 ml-1"> <img src="./img/25.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=45" class="w-25 ml-1"> <img src="./img/26.png" class="w-100 ml-1" alt="..."></a>
                  <a href="product_detail.php?id=46" class="w-25 ml-1"> <img src="./img/27.png" class="w-100 ml-1" alt="..."></a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>


        </div>




        <div style="background-color: #1F2436; padding-top:50px; padding-bottom:30px; ">

          <p style="text-align: center; color:white; margin-top:20px; margin-top:80px;">© 2021 GESPORT. All Rights Reserved.</p>


        </div>

        <!-- <center>
          <div style="background-color: #1F2436; padding-left:50px;  padding-right:50px;  padding-bottom:50px; padding-top:0px; margin-top:-20px">
            <a href="http://localhost/gesport/showProduct.php?act=showbytype&type_id=2">
              <img class="col-md-9" src="./img/banner12.png">
            </a>
          </div>
        </center> -->




  </body>

</html>