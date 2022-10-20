    <?php
    $listkh = loadall_khachhang();
    if (isset($_POST['submit'])) {   
        $ten = $_POST['ho_ten'];
        $email = $_POST['email'];
        foreach ($listkh as $key => $value) {
            if ($email == $value['email']&&$ten == $value['ho_ten']) {
                    $pasword = substr(sha1(time()), 0, 5);
                    $newpasword = password_hash($pasword, PASSWORD_BCRYPT);
                    recover_password($value['ma_kh'],$newpasword);
                    $thong_Bao = "Mật Khẩu Mới Của Bạn Là : $pasword "; 
            }
        }
        if (!isset($thong_Bao)) {
            $thong_Bao_error = "Xác Nhận 2 Yếu Tố Thất Bại";
        }
    }


    ?>
    <div class="flex h-96 mb-10 ">

        <form class="w-full flex flex-col items-center gap-y-7" action="index.php?act=quenmk" method="post">
            <h1 class="text-2xl"> Xác Thực Hai Yếu Tố</h1>
            <h1 class="text-2xl text-red-500 flex-none"><?= isset($thong_Bao_error) ? $thong_Bao_error : "" ?></h1>
            <h1 class="text-green-500 text-2xl"> <?= isset($thong_Bao) ? $thong_Bao : "" ?></h1>
            <input class="w-[500px] border border-stone-600 p-2" type="text" name="email" value="" placeholder="Nhập Email">
            <input class="w-[500px] border border-stone-600 p-2" type="text" name="ho_ten" value="" placeholder="Nhập họ tên">
            <input class=" text-white bg-blue-500 p-3 rounded-sm ml-5 hover:bg-blue-600" type="submit" value="Lấy lại Mật Khẩu" name="submit">
        </form>







        <?php
        include "view/box_right.php";
        ?>
    </div>