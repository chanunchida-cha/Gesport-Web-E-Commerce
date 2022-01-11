<?php
//include('h.php');
include('./backend/conect.php');
$p_id = $_GET["id"];

?>
<!DOCTYPE html>

<head>
  <title>Gesport</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
  <style>
    div.polaroid {
      width: 80%;
      background-color: white;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      margin-bottom: 25px;
    }

    div.container_di {
      text-align: center;
      padding: 10px 20px;
    }
  </style>
</head>

<body style="font-family: 'Kanit', sans-serif; background-color:#fff;">

  <div class="container" style="margin-top: 100px;">
    <?php include('./nav.php'); ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p 
              INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
               AND p_id = $p_id ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);

      ?>
      <div class="col-md-10">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <div class="col-md-6">
              <div class="polaroid">
                <?php echo "<img src='backend/p_img/" . $row['p_img'] . "'width='100%'>"; ?>
                <div class="container_di">
                  <p style="font-family: 'Kanit', sans-serif; font-size:20;"><?php echo $row["p_name"]; ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b style="font-family: 'Kanit', sans-serif;"><?php echo $row["p_name"]; ?></b></h3>
              <p style="font-family: 'Kanit', sans-serif; font-size:20;">
                ประเภท <?php echo $row["type_name"]; ?>
              </p>
              <p style="font-family: 'Kanit', sans-serif;">
                ราคา <?php echo $row["p_price"]; ?>
              </p>
              <p style="font-family: 'Kanit', sans-serif;">
                <?php echo $row["p_detail"]; ?>
              </p>
            </div>
            <div>
              <?php if ($row['p_stock'] > 0) { ?>
                <a href="cart2.php?p_id=<?php echo $row['p_id'] ?>&act=add" class="btn btn-primary btn-sm" style="font-family: 'Kanit', sans-serif;">หยิบใส่ตะกร้า</a>
              <?php } else {
                echo '<button class="btn btn-dark  btn-sm" style="font-family: "Kanit", sans-serif;" disabled>สินค้าหมด</button>';
              } ?>
            </div>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>