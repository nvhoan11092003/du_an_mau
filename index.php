<?php 
    require_once "db.php";
    include "view/header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'gt':
                include "view/gioithieu.php";
                break;
            case 'lh':
                include "view/lienhe.php";
                break;
            case 'gy':
                include "view/gopy.php";
                break;
            case 'hd':
                include "view/hoidap.php";
                break;
            case '':
                include "hanghoa/";
                break;
            case '':
                include "";
                break;
    
            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php"; 
    }
    include "view/footer.php";
    

?>