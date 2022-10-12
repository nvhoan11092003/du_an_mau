<?php 
    $sql = "SELECT * FROM khach_hang";
    $listuser = pdo_query($sql);
    $tk = $_POST['tk']; 
    $mk= $_POST['mk'];
    $on = false;
    foreach ($listuser as $key => $value) {
        if ($value['email'] === $tk) {
            if (password_verify($mk , $value['mat_khau'])) {
                $_SESSION['user'] = $value;
                $on = true;
           }
        }
    }

    if($on){
        header("location:index.php");
    }
    else{
        header('location:index.php?error=tài khoản hoặc mật khẩu không đúng');
    }
