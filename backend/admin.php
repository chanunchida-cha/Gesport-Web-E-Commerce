<!DOCTYPE html>
<html>

<head>
    <?php 
    include('../backend/header.php');
    error_reporting(0);
    ?>

    <head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <a href="admin.php?act=add" class="btn-info btn-sm" >เพิ่ม</a>
                    <p></p>
                    <?php
                    $act = $_GET['act'];
                    if ($act == 'add') {
                        include('admin_form_add.php');
                    } elseif ($act == 'edit') {
                        include('admin_form_edit.php');
                    }elseif ($act == 'rwd') {
                        include('admin_form_rwd.php');
                    } 
                     else {
                        include('admin_list.php');
                    }
                    ?>
                    <!-- Content Wrapper. Contains page content -->
                </div>
            </div>
        </div>
    </body>

</html>