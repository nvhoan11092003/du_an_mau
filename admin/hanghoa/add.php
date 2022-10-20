<?php 
    $listdm = loadall_loaihang();
    $thong_Bao;
    if (isset($_POST['them_moi'])) {
        $iddm = $_POST['iddm'];
        $ten_hh = $_POST['ten_hh'] ;
        $don_gia = $_POST['don_gia'] ;
        $giam_gia = $_POST['giam_gia'] ;
        $mo_Ta = $_POST['mo_ta'] ;
        $hinh = $_FILES['hinh_anh']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . uniqid() . '_' . $hinh;
        $today = date("d/m/y"); 
        // move_uploaded_file(nội dung file, đường dẫn tới ảnh được lưu);
        move_uploaded_file( $_FILES['hinh_anh']['tmp_name'], $target_file);
        insert_sanpham($ten_hh,$don_gia,$giam_gia,$target_file,$today,$mo_Ta,$iddm);
        $thong_Bao= "Đã thêm Thành Công Sản phẩm";
    }
?>



<!-- form nhap du lieu add hang hoa -->
<div class="">
    <h1 class="text-3xl">Thêm Mới Hàng Hóa</h1>
    <h1 class='text-green-400'><?= isset($thong_Bao) ? $thong_Bao : ""; ?></h1>
    <form action="../admin/index.php?act=addhh" method="post" enctype="multipart/form-data">
        <h1 class="my-2 text-xl">Tên Sản Phẩm</h1>
        <input type="text" name="ten_hh" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <!-- danh mục -->
        <h1 class="my-2 text-xl">Danh Mục</h1>
        <select name="iddm" id="" class="border rounded-md border-black h-8 block w-[150px]">
            <?php foreach ($listdm as $key => $value) :?>
                <option value="<?= $value['ma_loai'] ?>"><?=$value['ten_loai'] ?></option>
            <?php endforeach?>
        </select>
        <h1 class="my-2 text-xl">Giá</h1>
        <input type="text" name="don_gia" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <h1 class="my-2 text-xl">Giảm Giá</h1>
        <input type="text" name="giam_gia" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <h1 class="my-2 text-xl">Ảnh Sản Phẩm</h1>
        <input type="file" name="hinh_anh" >
        <h1 class="my-2 text-xl">Mô tả</h1>
        <textarea name="mo_ta" id="" cols="60" rows="10" class="border border-black rounded-lg"></textarea>
        <div class="mt-3">
            <input type="reset" value="Nhập Lại" class="w-[120px] h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
            <input type="submit" value="Thêm Mới" name="them_moi" class="w-[120px] h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
            <a href="../admin/index.php?act=listhh"><input type="button" value="danh sách"      class="w-[120px] h-[35px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
        </div>
    </form>
</div>
