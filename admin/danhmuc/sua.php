<?php
if (isset($_GET['id'])) {
    $error = "";
    $id = $_GET['id'];
    $loai_hang = loadone_loaihang($id);
}
if (isset($_POST['cap_nhat'])) {
    $ten_loai = $_POST['ten_loai'];
    $id = $_POST['ma_loai'];
    $error = "";
    if ($ten_loai == "") {
        $error = "Trường Này Không được để Trống";
    }
    // kiểm tra tên loại hàng không được để trống
    $ds_loai_hang = loadall_loaihang();
    foreach ($ds_loai_hang as $key => $value) {
        if ($ten_loai === $value["ten_loai"]&& $id != $value["ma_loai"]  ) {
            $error ="Loại Hàng Này Đã Tồn Tại";
        }
    }
    var_dump($error);
    if (!$error) {
        update_loaihang($ten_loai,$id);
        $thong_Bao = " đã cập nhật thành công thành loại hàng có tên : $ten_loai vào danh mục";
        header('location:index.php?act=listdm');
    }
}



?>

<div class="">
    <h1 class="text-3xl my-3">Sửa Loại Hàng</h1>
    <form action="../admin/index.php?act=suadm&id=<?= $loai_hang['ma_loai'] ?>" method="post">
        <h1 class="my-3 text-xl">MÃ LOẠI</h1>
        <input type="hidden" name="ma_loai" value="<?= $loai_hang['ma_loai'] ?>" >
        <input type="text" value="<?= $loai_hang['ma_loai'] ?>" class="max-w-[500px] w-[500px] h-[40px] border bg-gray-300  pl-2 rounded-md m-1" disabled>
        <h1 class="my-3 text-xl">Tên Loại Hàng</h1>
        <input type="text" name="ten_loai" value="<?= $loai_hang['ten_loai'] ?>" class="max-w-[500px] w-[500px] h-[40px] border-2 focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <!-- Nơi Báo Lỗi -->
        <h1 class="text-red-600"><?= isset($error) ? $error : ""; ?></h1>
        <!-- Nơi Báo thành Công -->
        <h1 class='text-green-400'><?= isset($thong_Bao) ? $thong_Bao : ""; ?></h1>
        <div class="mt-3">
            <input type="reset" value="Nhập Lại" class="w-[120px] h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
            <input type="submit" value="Cập Nhật" name="cap_nhat" class="w-[120px] h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
            <a href="../admin/index.php?act=listdm"><input type="button" value="danh sách" class="w-[120px] h-[35px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
        </div>
    </form>

</div>