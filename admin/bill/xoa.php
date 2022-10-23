<?php 
require_once('../../db.php');
include('../../model/cart.php');
    $id = $_GET['id'];
    delete_bill($id);
    header("location:" . $_SERVER["HTTP_REFERER"]);
?>