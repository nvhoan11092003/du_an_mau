<?php 
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // array_slice( $_SESSION['mycart'],$id, 1 );
        unset($_SESSION['mycart'][$id]);
        echo"xoa";
    }else{
        $_SESSION['mycart'] = [];
    }
    // var_dump( $_SESSION['mycart']);
    var_dump($_GET['id']);
    header('location:../../index.php?act=viewcart');    
?>