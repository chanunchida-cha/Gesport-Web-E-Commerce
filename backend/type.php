<!DOCTYPE html>
<html>

<head>
    <?php 
    include('header.php');
    error_reporting(0);
    ?>

    <head>

    <body>
        <div class="container">
            <?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <!-- Left side column. contains the logo and sidebar -->
                    <?php include('menu-left.php'); ?>
                    <!-- Content Wrapper. Contains page content -->
                </div>
                <div class="col-md-9">
                    <a href="type.php?act=add" class="btn-info btn-sm" >เพิ่ม</a>
                    <p></p>
                    <?php
                    $act = $_GET['act'];
                    if ($act == 'add') {
                        include('type_form_add.php');
                    } elseif ($act == 'edit') {
                        include('type_form_edit.php');
                    } else {
                        include('type_list.php');
                    }
                    ?>
                    <!-- Content Wrapper. Contains page content -->
                </div>
            </div>
        </div>
    </body>

</html>