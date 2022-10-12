<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];
    $xn_mat_khau  = $_POST['xn_mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $thu_Thi =true;
    // check email đã tồn tại
    $sql = "SELECT email FROM khach_hang";
    $email_user = pdo_query($sql);
    foreach ($email_user as $key => $value) {
        if ($email == $value["email"]) {
            $erroremail = " email này đã tồn tại";
            $thu_Thi= false;
        }
    }
    if ($mat_khau != $xn_mat_khau) {
        $errormk = "xác nhận mật khẩu sai";
        $thu_Thi= false;
    }
    if ($email == "") {
        $emailnull = "Trường Này Không Được Để Trống";
        $thu_Thi= false;
    }
    if ($mat_khau == "") {
        $mat_khaunull = "Trường Này Không Được Để Trống";
        $thu_Thi= false;
    }
    if ($ho_ten == "") {
        $ho_tennull = "Trường Này Không Được Để Trống";
        $thu_Thi= false;
    }
    if($thu_Thi){
        $new_password = password_hash($mat_khau, PASSWORD_BCRYPT);
        $target_file = "";
        if ($_FILES['hinh_anh']['name'] != "") {
            $hinh = $_FILES['hinh_anh']['name'];
            $target_dir = "taikhoan/images/";
            $target_file = $target_dir . uniqid() . '_' . $hinh;
            // move_uploaded_file(nội dung file, đường dẫn tới ảnh được lưu);
            move_uploaded_file( $_FILES['hinh_anh']['tmp_name'], $target_file);
        }
        $sql ="INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, kich_hoat, hinh_anh, email, vai_tro) VALUES ('','$new_password','$ho_ten','[value-4]','$target_file','$email','')";
        pdo_execute($sql);
        $thong_Bao= "Đã Đăng ký Thành Công Tài Khoản";
    }
}
?>

<div class="flex  mb-10 ">
    <!-- form dang ky tk -->
    <form class="w-full border p-5 flex flex-col justify-stat items-center gap-y-5" action="index.php?act=dangkytk" method="post" enctype="multipart/form-data">
        <h1 class=" text-2xl"> Đăng ký thành viên</h1>
        <h1 class="text-green-500 text-2xl"> <?= isset($thong_Bao) ? $thong_Bao : "" ?></h1>
        <div class="">
            <input class="w-[400px] border border-stone-600 p-2" type="text" value="<?= isset($email) ? $email : "" ?>" name="email" placeholder="Email">
            <h1 class="flex-none text-red-500">
                <?= isset($emailnull) ? $emailnull : "" ?>
                <?= isset($erroremail) ? $erroremail : "" ?>
            </h1>
        </div>
        <div class="">
            <input class="w-[400px] border border-stone-600 p-2" type="text" value="" name="mat_khau" placeholder="Mật Khẩu">
            <h1 class="flex-none text-red-500">
                <?= isset($mat_khaunull) ? $mat_khaunull : "" ?>
            </h1>
        </div>
        <div class="">
            <input class="w-[400px] border border-stone-600 p-2" type="text" value="" name="xn_mat_khau" placeholder="Xác Nhận Mật Khẩu">
            <h1 class="flex-none text-red-500">
                <?= isset($errormk) ? $errormk : "" ?>
            </h1>
        </div>
        <div class="">
            <input class="w-[400px] border border-stone-600 p-2" type="text" value="<?= isset($ho_ten) ? $ho_ten : "" ?>" name="ho_ten" placeholder="Tên Người dùng">
            <h1 class="flex-none text-red-500">
                <?= isset($ho_tennull) ? $ho_tennull : "" ?>
            </h1>
        </div>
        <div class="">
            <h1>Ảnh Người Dùng</h1>
            <input class="w-[400px] " type="file" value="ảnh" name="hinh_anh">
        </div>
        <div class="">
            <input class="w-[120px] text-white bg-yellow-400  hover:bg-yellow-500 py-3" type="reset" value="Nhập Lại">
            <input class="w-[120px] text-white bg-blue-500 py-3 ml-5 hover:bg-blue-600" type="submit" value="Đăng Ký" name="submit">
        </div>
    </form>
    <?php
    include "view/box_right.php";
    ?>
</div>