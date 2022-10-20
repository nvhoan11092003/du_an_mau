<?php
extract($_SESSION['user']);
if (isset($_POST['submit'])) {
    $mat_khaumoi = $_POST['mat_khau'];
    $ho_tenmoi  = $_POST['ho_ten'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $thuc_Thi =true;
    if ($mat_khaumoi == "") {
        $mat_khaumoi = $mat_khau;
    }else{
        $mat_khaumoi = password_hash($mat_khaumoi , PASSWORD_BCRYPT);
    }
    if ($ho_tenmoi == "") {
        $ho_tennull = "Trường Này Không Được Để Trống";
        $thuc_Thi= false;
    }
    if($thuc_Thi){
        $target_file = $hinh_anh;
        if ($_FILES['hinh_anh']['name'] != "") {
            $hinh = $_FILES['hinh_anh']['name'];
            $target_dir = "taikhoan/images/";
            $target_file = $target_dir . uniqid() . '_' . $hinh;
            // move_uploaded_file(nội dung file, đường dẫn tới ảnh được lưu);
            move_uploaded_file( $_FILES['hinh_anh']['tmp_name'], $target_file);
        }
        update_khachhang($mat_khaumoi,$ho_tenmoi,$target_file,$dia_chi,$sdt,$ma_kh);
        $_SESSION['user'] = loadone_khachhang($ma_kh);
        extract($_SESSION['user']);
        $thong_Bao= "Đã Cập Nhật Thành Công Tài Khoản";
    }
}

?>
<div class="flex h-96 mb-10 ">
    <!-- from Sửa -->
    <form class="w-full flex flex-col gap-y-3 items-center" action="index.php?act=suatk" method="post" enctype="multipart/form-data">
        <h1 class="text-center text-2xl "> Thông tin</h1>
        <h1 class="text-green-500 text-2xl"> <?= isset($thong_Bao) ? $thong_Bao : "" ?></h1>
        <div class="">
            <h2>Tên</h2>
            <input class="w-[400px] border border-stone-600 p-2 " name="ho_ten" type="text" value="<?= $ho_ten ?>">
            <h1 class="flex-none text-red-500">
                <?= isset($ho_tennull) ? $ho_tennull : "" ?>
            </h1>
        </div>
        <div class="">
            <h2>Email</h2>
            <input class="w-[400px] border border-stone-600 bg-stone-300 p-2" type="text" value="<?= $email ?>" disabled>
            <h1 class="flex-none"></h1>
        </div>
        <div class="">
            <h2>Địa Chỉ</h2>
            <input name="dia_chi" class="w-[400px] border border-stone-600 p-2" type="text" value="<?= $dia_chi ?>" >
            <h1 class="flex-none"></h1>
        </div>
        <div class="">
            <h2>Số Điện Thoại</h2>
            <input name="sdt" class="w-[400px] border border-stone-600 p-2" type="text" value="<?= $sdt ?>" >
            <h1 class="flex-none"></h1>
        </div>
        <div class="">
            <h2>Mật Khẩu Mới</h2>
            <input class="w-[400px] border border-stone-600 p-2" type="text" name="mat_khau" value="">
            <h1 class="flex-none"></h1>
        </div>
        <div class="">
            <img src=" <?= ($hinh_anh!="")?  $hinh_anh : "taikhoan/images/avt_base.jpg" ?>" alt="" class="w-[100px] max-w-[80px] float-left">
            <h2>Ảnh Người Dùng</h2> 
            <input class="w-[400px] mt-2" type="file" value="ảnh" name="hinh_anh">
        </div>
        <div class="">
            <input class="w-[120px] text-white bg-blue-500 py-3 ml-5 hover:bg-blue-600" type="submit" value="Lưu Thay Đổi" name="submit">
        </div>
    </form>
    <?php
    include "view/box_right.php";
    ?>
</div>