<!-- form nhap du lieu add danh muc -->
<div class="">
    <h1 class="text-3xl">Thêm Mới Danh Mục</h1>
    <form action="../admin/index.php?act=adddm" method="post">
        <h1 class="my-3 text-xl">Tên Loại Hàng</h1>
        <input type="text" name="ten_loai" class="max-w-[500px] w-[500px] h-[40px] border-2 focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <!-- Nơi báo lỗi -->
        <?php
        // Kiểm Tra Tên Không được Để Trống
        if (isset($_POST["ten_loai"])) {
            $error = true;
            $ten_loai = $_POST["ten_loai"];
            if ($ten_loai == "") {
                echo '<h1 class="text-red-600">Trường Này Không được để Trống</h1>';
                $error = false;
            }
        }
        if (isset($_POST["ten_loai"])) {
            $ten_loai = $_POST["ten_loai"];
            // kiểm tra tên loại hàng không được để trống
            $ds_loai_hang = loadall_loaihang();
            foreach ($ds_loai_hang as $key => $value) {
                if ($ten_loai === $value["ten_loai"]) {
                    echo '<h1 class="text-red-600">Loại Hàng Này Đã Tồn Tại </h1>';
                    $error = false;
                }
            }
        }
        ?>
        <div class="mt-3">
            <input type="reset" value="Nhập Lại" class="w-[120px] h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
            <input type="submit" value="Thêm Mới" name="them_moi" class="w-[120px] h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
            <a href="../admin/index.php?act=listdm"><input type="button" value="danh sách"      class="w-[120px] h-[35px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
        </div>
    </form>

</div>
<?php
if (isset($error)) {
    if ($error) {
        insert_loaihang($ten_loai);
        $thong_Bao = " đã thêm thành công Loại hàng có tên : $ten_loai vào danh mục";
        echo  "<h1 class='text-green-400'>$thong_Bao</h1>";
    }
}








?>