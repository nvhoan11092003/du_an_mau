<?php
function loadall_sanpham($kyw="",$id=-1){
    $sql = "SELECT * FROM hang_hoa inner join loai_hang WHERE loai_hang.ma_loai = hang_hoa.ma_loai";
        if ($kyw!="") {
            $sql .= " and ten_hh like '%$kyw%' ";
        }
        if($id>0){
            $sql .=  " and hang_hoa.ma_loai = $id ";
        }
        $sql.=" order by ma_hh desc";
    $ds_hang_hoa = pdo_query($sql);
    return $ds_hang_hoa;
};

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM hang_hoa  WHERE ma_hh = $id";
    $hang_hoa = pdo_query_one($sql);
    return $hang_hoa;
}

function loadall_sanpham_categories($id , $idcungloai){
    $sql = "SELECT * FROM hang_hoa where ma_loai = '$idcungloai' and   '" . $id . "'  <> ma_hh ";
    $hang_hoa = pdo_query($sql);
    return $hang_hoa;
};
function insert_sanpham($ten_hh,$don_gia,$giam_gia,$target_file,$today,$mo_Ta,$iddm){
    $sql =" INSERT INTO hang_hoa(ma_hh, ten_hh, don_gia, giam_gia, hinh_anh, ngay_nhap, mo_ta, dac_biet, so_luot_xem, ma_loai) VALUES ('','$ten_hh','$don_gia','$giam_gia','$target_file','$today','$mo_Ta','[value-8]','[value-9]','$iddm')";
    pdo_execute($sql);
}

function update_sanpham($id,$ten_hh,$don_gia,$giam_gia,$hinh,$mo_Ta,$iddm){
    if($hinh!=""){
        $target_dir = "images/";
        $target_file = $target_dir . uniqid() . '_' . $hinh;
        // move_uploaded_file(nội dung file, đường dẫn tới ảnh được lưu);
        move_uploaded_file( $_FILES['hinh_anh']['tmp_name'], $target_file);
        $sql =" UPDATE hang_hoa SET ten_hh='$ten_hh',don_gia='$don_gia',giam_gia='$giam_gia',hinh_anh='$target_file',mo_ta='$mo_Ta',ma_loai='$iddm' WHERE ma_hh = '$id'";
    }
    else{
        $sql =" UPDATE hang_hoa SET ten_hh='$ten_hh',don_gia='$don_gia',giam_gia='$giam_gia',mo_ta='$mo_Ta',ma_loai='$iddm' WHERE ma_hh = '$id'";
    }
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql="DELETE FROM hang_hoa WHERE ma_hh = $id";
    pdo_execute($sql);
}
?>