<?php 
    $id = $_GET['id'];
    $thong_Bao;
    if (isset($_POST['sua'])) {
        $iddm = $_POST['iddm'];
        $ten_hh = $_POST['ten_hh'] ;
        $don_gia = $_POST['don_gia'] ;
        $giam_gia = $_POST['giam_gia'] ;
        $mo_Ta = $_POST['mo_ta'] ;
        if ($_FILES['hinh_anh']['name']!= ""){
            $hinh = $_FILES['hinh_anh']['name'];
            $target_dir = "images/";
            $target_file = $target_dir . uniqid() . '_' . $hinh;
             // move_uploaded_file(nội dung file, đường dẫn tới ảnh được lưu);
        move_uploaded_file( $_FILES['hinh_anh']['tmp_name'], $target_file);
        
        $sql =" UPDATE hang_hoa SET ten_hh='$ten_hh',don_gia='$don_gia',giam_gia='$giam_gia',hinh_anh='$target_file',mo_ta='$mo_Ta',ma_loai='$iddm' WHERE ma_hh = '$id'";
        }
        else {
            $sql =" UPDATE hang_hoa SET ten_hh='$ten_hh',don_gia='$don_gia',giam_gia='$giam_gia',mo_ta='$mo_Ta',ma_loai='$iddm' WHERE ma_hh = '$id'";
        }
        pdo_execute($sql);
        $thong_Bao= "Đã sửa Thành Công Sản phẩm";
    }
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh = '$id'";
    $hangHoa = pdo_query_one($sql);
    $sql = "SELECT * FROM loai_hang";
    $listdm = pdo_query($sql);
?>




<!-- form nhap du lieu add hang hoa -->
<div class="">
    <h1 class="text-3xl">Sửa Hàng Hóa</h1>
    <h1 class='text-green-400'><?= isset($thong_Bao) ? $thong_Bao : ""; ?></h1>
    <form action="../admin/index.php?act=suahh&id=<?=$hangHoa['ma_hh'] ?>" method="post" enctype="multipart/form-data">
        <h1 class="my-2 text-xl">Tên Sản Phẩm</h1>
        <input type="text" name="ten_hh" value="<?=$hangHoa['ten_hh'] ?>" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <!-- danh mục -->
        <h1 class="my-2 text-xl">Danh Mục</h1>
        <select name="iddm" id="" class="border rounded-md border-black h-8 block w-[150px]">
            <?php foreach ($listdm as $key => $value) :?>
                <option <?php if ($value['ma_loai'] === $hangHoa['ma_loai']) {
                    echo "selected";}?>  value="<?= $value['ma_loai'] ?>"><?=$value['ten_loai'] ?></option>
            <?php endforeach?>
        </select>
        <h1 class="my-2 text-xl">Giá</h1>
        <input type="text" name="don_gia" value="<?=$hangHoa['don_gia'] ?>" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <h1 class="my-2 text-xl">Giảm Giá</h1>
        <input type="text" name="giam_gia" value="<?=$hangHoa['giam_gia'] ?>" class="max-w-[500px] w-[500px] h-[40px] border focus:border-blue-700 border-black pl-2 rounded-md m-1">
        <h1 class="my-2 text-xl ">Ảnh Sản Phẩm</h1>
        <input type="file" name="hinh_anh" >
        <img src="<?=$hangHoa['hinh_anh'] ?>" alt="chưa có">
        <h1 class="my-2 text-xl">Mô tả</h1>
        <textarea name="mo_ta" id="" cols="60" rows="10" class="border border-black rounded-lg"><?=$hangHoa['mo_ta'] ?></textarea>
        <div class="mt-3">
            <input type="reset" value="Nhập Lại" class="w-[120px] h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
            <input type="submit" value="cập nhật" name="sua" class="w-[120px] h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
            <a href="../admin/index.php?act=listhh"><input type="button" value="danh sách"      class="w-[120px] h-[35px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
        </div>
    </form>
</div>