<?php
session_start();
session_destroy();
header("Location: http://localhost/gesport/index.php");	
?>