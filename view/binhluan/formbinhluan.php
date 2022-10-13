<?php
session_start();
require_once "../../db.php";
$idpro = $_REQUEST['idpro'];
if (isset($_SESSION['user'])) {
    $iduser = $_SESSION['user']['ma_kh'];
}

$ngaybl = date('s:i:h d/m/y');
if (isset($_POST['submit'])) {
    $idpro = $_POST['idpro'];
    $noidung = $_POST['noidung'];
    $sql = "INSERT INTO binh_luan(ma_bl, noi_dung, ma_hh, ma_kh, ngay_bl) VALUES ('','$noidung','$idpro','$iduser','$ngaybl')";
    pdo_execute($sql);
    header("location:" . $_SERVER["HTTP_REFERER"]);
}
$sql = "SELECT * FROM binh_luan inner join khach_hang on binh_luan.ma_kh=khach_hang.ma_kh WHERE ma_hh ='$idpro' order by binh_luan.ngay_bl  ASC limit 0,9";
$listbl = pdo_query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" w-full ">
    <h1 class="text-2xl text-center">Bình Luận</h1>
    <table class="border border-black w-full">
        <thead>
            <tr class="p-2">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listbl as $key => $value) :
                extract($value)
            ?>
                <tr class="p-4">
                    <td><img class="h-[50px] w-[50px] rounded-full" src=" <?= ($hinh_anh != "") ?  $hinh_anh : "taikhoan/images/avt_base.jpg" ?>" alt=""></td>
                    <td><?= $ho_ten ?></td>
                    <td class="flex justify-center items-center h-[60px] max-w-[400px] overflow-clip"><?= $noi_dung ?></td>
                    <td><?= $ngay_bl ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php if (isset($_SESSION['user'])) {
    ?>
        <form class="mt-4 flex items-center gap-x-2" action="view/binhluan/formbinhluan.php" method="POST">
            <input class="h-[36px] w-[400px] rounded-xl p-2 text-lg border border-slate-500 " type="text" name="noidung" required>
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <input class="text-white rounded-lg bg-blue-400 p-2" type="submit" value="Bình Luận" name="submit">
        </form>
    <?php  } else {
        echo "<h1>Đăng nhập để bình luận</h1>";
    }
    ?>
    
</body>

</html>