
<form action="" method="get" class="form-horizontal">
           <h6>เลือกช่วงวันที่ที่ต้องการดูยอดขาย</h6>
           <input type="hidden" class="form-control" name="act" value="report">
           <div class="form-row">
               <div id="non-printable" class="form-group col-md-5">
                   <label>วันที่เริ่มต้น</label>
                   <input type="date" class="form-control" name="ds">
               </div>
               <div id="non-printable" class="form-group col-md-5">
                   <label>วันที่สิ้นสุด</label>
                   <input type="date" class="form-control" name="de">
               </div>
               <div id="non-printable" class="form-group col-md-2">
                   <button type="submit" class="btn btn-dark" style="margin-top:32px;" name="do" value="ragedate">ค้นหา</button>
               </div> 
           </div>

       </form>
       <?php
        include('./conect.php');
        $query = " SELECT 
            SUM(o_total) AS total, 
            DATE_FORMAT(o_dttm, '%d-%M-%Y') AS o_dttm
            FROM order_head
            WHERE o_status IN (2,3)
            GROUP BY DATE_FORMAT(o_dttm, '%Y-%m-%d')
            ORDER BY DATE_FORMAT(o_dttm, '%Y-%m-%d') DESC
            ";

        $result = mysqli_query($conn, $query);
        $resultchart = mysqli_query($conn, $query);
        //for chart
        $o_dttm = array();
        $total = array();
        while ($rs = mysqli_fetch_array($resultchart)) {
            $o_dttm[] = "\"" . $rs['o_dttm'] . "\"";
            $total[] = "\"" . $rs['total'] . "\"";
        }
        //ตัดคอมม่าใน array ตัวสุดท้าย
        $o_dttm = implode(",", $o_dttm);
        $total = implode(",", $total);

        ?>

       <head>
           <style type="text/css">
               #printable {
                   display: block;
               }

               @media print {
                   #non-printable {
                       display: none;
                   }

                   #printable {
                       display: block;
                   }
               }
           </style>
       </head>
       <div id="printable">
           <h4 align="center">รายงานยอดขายรายวัน</h4>

           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
           <hr>
           <p align="center">
               <!--devbanban.com-->
               <canvas id="myChart" width="800px" height="300px"></canvas>
               <script>
                   var ctx = document.getElementById("myChart").getContext('2d'); //lable
                   var myChart = new Chart(ctx, {
                       type: 'bar',
                       data: {
                           labels: [<?php echo $o_dttm; ?>

                           ],
                           datasets: [{
                               label: 'รายงานรายได้ แยกตามวัน (บาท)',
                               data: [<?php echo $total; ?>],
                               backgroundColor: [
                                   'rgba(215, 189, 226)',
                                   'rgba(174, 214, 241)',
                                   'rgba(249, 231, 159)',
                                   'rgba(169, 223, 191 )',
                                   'rgba(229, 152, 102)',
                                   'rgba(127, 179, 213)',
                                   'rgba(240, 128, 128)',
                                   'rgba(215, 189, 226)',
                                   'rgba(174, 214, 241)',
                                   'rgba(249, 231, 159)',
                                   'rgba(169, 223, 191 )',
                                   'rgba(229, 152, 102)',
                                   'rgba(127, 179, 213)',
                                   'rgba(240, 128, 128)',
                                   'rgba(215, 189, 226)',
                                   'rgba(174, 214, 241)',
                                   'rgba(249, 231, 159)',
                                   'rgba(169, 223, 191 )',
                                   'rgba(229, 152, 102)',
                                   'rgba(127, 179, 213)',
                                   'rgba(240, 128, 128)',
                                   'rgba(215, 189, 226)',
                                   'rgba(174, 214, 241)',
                                   'rgba(249, 231, 159)',
                                   'rgba(169, 223, 191 )',
                                   'rgba(229, 152, 102)',
                                   'rgba(127, 179, 213)',
                                   'rgba(240, 128, 128)'
                               ]

                           }]
                       },
                       options: {
                           scales: {
                               yAxes: [{
                                   ticks: {
                                       beginAtZero: true
                                   }
                               }]
                           }
                       }
                   });
               </script>
           </p>
           
<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      "aaSorting": [
        [0, 'ASC']
      ],
      //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
    });
  });
</script>
           <div class="col-sm-12">
               <form>
                   <!-- ตาราง -->
                   <h5>รายการยอดขายรายวัน</h5>
                   <table class="table table-striped" id="example1" border="1" cellpadding="0" cellspacing="0" align="center">
                       <thead class="thead-dark">
                           <tr class="table-primary">
                               <th width="20%">วัน/เดือน/ปี</th>
                               <th width="10%">
                                   <center>รายได้</center>
                               </th>
                           </tr>
                       </thead>


                       <?php
                        $ototal = 0;
                        while ($row2 = mysqli_fetch_array($result)) {

                        ?>
                           <tr>
                               <td>
                                   <font color='black'><?php echo $row2['o_dttm']; ?></font>
                               </td>
                               <td align="right">
                                   <font color='black'><?php echo number_format($row2['total'], 2); ?></font>
                               </td>
                           </tr>
                       <?php
                            $ototal += $row2['total'];
                        } //ปิด while
                        ?>
                       <tr class="table-secondary">

                           <td align="center">
                               <font color='black'>รวม</font>
                           </td>
                           <td align="right"><b>
                                   <font color='black'>
                                       <?php echo number_format($ototal, 2); ?></font>
                               </b></td>
                           </td>
                       </tr>
                   </table>
                   <input name="print" type="submit" id="non-printable" value="พิมพ์รายงาน" onClick="window.print()" />
               </form>
           </div>
       </div>
       <div class="footer" style="padding: 200px;">

       </div>

       <?php mysqli_close($conn); ?>
       <style type="text/css"> 
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
</style> 