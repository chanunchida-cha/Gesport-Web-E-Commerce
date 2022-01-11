<body style="font-family: 'Kanit', sans-serif;">

    <?php include('../backend/header.php'); ?>
    <div class="col-md-10" style="margin-top: 100px;
            margin-left: 30px;">
        <a href="../bootstrap/index.php?act=report" class="btn btn-warning btn-sm">รายวัน </a>
        <a href="../bootstrap/index.php?act=report&do=month" class="btn btn-success btn-sm">รายเดือน</a>
        <a href="../bootstrap/index.php?act=report&do=year" class="btn btn-info btn-sm">รายปี</a>

        <p></p>
        <?php
        $do = (isset($_GET['do']) ? $_GET['do'] : '');
        if ($do == 'month') {
            include '../backend/report_m.php';
        } elseif ($do == 'year') {
            include '../backend/report_y.php';
        } elseif ($do == 'day') {
            include '../backend/report_d.php';
        } elseif ($do == 'ragedate') {
            include '../backend/report_rangedate.php';
        } else {
            include '../backend/report_d.php';
        }

        ?>
    </div>
</body>