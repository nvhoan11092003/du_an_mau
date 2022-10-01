<!-- form nhap du lieu add danh muc -->
<div class="">
    <h1 class="text-3xl">Thêm Mới Danh Mục</h1>
    <form action="../admin/index.php?act=adddm" method="post">
        <h1>Tên Loại Hàng</h1>
        <input type="text" name="loai_hang">
        <!-- Nơi báo lỗi -->
        <?php

        // Kiểm Tra Tên Không được Để Trống
        if (isset($_POST["loai_hang"])) {
            
            $ten_loai = $_POST["loai_hang"];
            if ($ten_loai == "") {
                echo '<h1 class="text-red-600">Trường Này Không được để Trống</h1>';
                
            }
        }
        if (isset($_POST["loai_hang"])) {
            $ten_loai = $_POST["loai_hang"];
            $error =true;
            // kiểm tra tên loại hàng không được để trống
            $sql = "SELECT * FROM loai_hang";
            $ds_loai_hang = pdo_query($sql);    
            foreach ($ds_loai_hang as $key => $value) {
                if ($ten_loai === $value["ten_loai"]) {
                    echo '<h1 class="text-red-600">Loại Hàng Này Đã Tồn Tại </h1>';
                    $error = false;
                }
            }
        }
        ?>

        <div class="">
            <input type="reset" value="Nhập Lại">
            <input type="submit" value="Thêm Mới" name="them_moi" class="hover:text-red-300 active:text-black">
            <button>ádsa</button>
        </div>
    </form>

</div>
<?php
if (isset($error)) {
    if ($error) {
        $sql = "INSERT INTO loai_hang (ma_loai, ten_loai) VALUES (NULL, '$ten_loai')";
        pdo_execute($sql);
        $thong_Bao = " đã thêm thành công hàng có tên : $ten_loai vào danh mục";
        echo $thong_Bao ? "<h1 class='text-green-400'>$thong_Bao</h1>" : "";
    }
}








?>